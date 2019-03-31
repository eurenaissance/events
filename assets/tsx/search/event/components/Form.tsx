import React, {Component, FormEvent} from 'react';
import {ApiCity} from '../../../types';
import {api} from '../../../api/api';
import {Canceler} from 'axios';
import {data} from '../../../data/readDataTag';
import * as Autosuggest from 'react-autosuggest';
import {SuggestionsFetchRequestedParams} from 'react-autosuggest';

const translations = data.readExposedData().translations;

interface Props {
    defaultCity: ApiCity | null,
    onChange(term: string, city: ApiCity | null): void,
}

interface State {
    term: string,
    city: ApiCity | null,
    cityTerm: string,
    cityLoading: boolean,
    cityResults: ApiCity[],
}

export class Form extends Component<Props, State> {
    private cancelRequest: Canceler | null = null;

    constructor(props: Props) {
        super(props);

        this.state = {
            term: '',
            city: this.props.defaultCity,
            cityTerm: this.props.defaultCity ? this.props.defaultCity.name : '',
            cityLoading: false,
            cityResults: this.props.defaultCity ? [this.props.defaultCity] : [],
        };
    }

    onTermChange(event: FormEvent<HTMLInputElement>) {
        this.setState({
            term: event.currentTarget.value
        });

        this.props.onChange(event.currentTarget.value, this.state.city);
    }

    onSuggestionsClearRequested() {
        this.setState({
            cityResults: [],
        });
    }

    onSuggestionSelected(data: any) {
        this.setState({
            city: data.suggestion,
        });

        this.props.onChange(this.state.term, data.suggestion);
    }

    search(term: string) {
        if (this.cancelRequest) {
            this.cancelRequest();
        }

        this.setState({
            cityLoading: true,
        });

        const request = api.searchCity(term, (canceler) => this.cancelRequest = canceler);

        request.then((response) => {
            this.setState({
                cityLoading: false,
                cityResults: response.data,
            });
        });
    }

    render() {
        return (
            <div className="search__form">
                <div className="search__form__label">
                    {translations['event_search.find']}
                </div>
                <div className="search__form__term">
                    <input type="text" className="form-control" placeholder={translations['event_search.all_events']}
                           onInput={(e) => this.onTermChange(e)} />
                </div>
                <div className="search__form__label">
                    {translations['event_search.around']}
                </div>
                <div className="search__form__city">
                    <div className="autocomplete">
                        <Autosuggest
                            suggestions={this.state.cityResults}
                            onSuggestionsFetchRequested={(request: SuggestionsFetchRequestedParams) => this.search(request.value)}
                            onSuggestionsClearRequested={() => this.onSuggestionsClearRequested()}
                            onSuggestionSelected={(event, data) => this.onSuggestionSelected(data)}
                            getSuggestionValue={(item: ApiCity) => item.name}
                            renderSuggestion={(item: ApiCity) => <span>{item.name}</span>}
                            inputProps={{
                                value: this.state.cityTerm,
                                onChange: (rawEvent, event) => this.setState({ cityTerm: event.newValue }),
                                className: 'form-control '+(this.state.cityLoading ? 'input-loading' : ''),
                                placeholder: translations['event_search.any_city']
                            }} />
                    </div>
                </div>
            </div>
        );
    }
}
