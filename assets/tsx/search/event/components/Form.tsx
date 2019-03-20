import React, {Component, FormEvent} from 'react';
import * as Autocomplete from 'react-autocomplete';
import {ApiCity} from '../../../types';
import {api} from '../../../api/api';
import {Canceler} from 'axios';

interface Props {
    defaultCity: ApiCity | null,
    onChange(term: string, city: ApiCity | null): void,
}

interface State {
    term: string,
    city: ApiCity | null,
    cityTerm: string,
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
            cityResults: this.props.defaultCity ? [this.props.defaultCity] : [],
        };
    }

    search (term: string) {
        if (this.cancelRequest) {
            this.cancelRequest();
        }

        const request = api.searchCity(term, (canceler) => this.cancelRequest = canceler);

        request.then((response) => {
            this.setState({ cityResults: response.data });
        });
    }

    render() {
        return (
            <div className="row justify-content-center mt-5">
                <div className="col-lg-11">
                    <div className="search__form">
                        <div className="search__form__label">
                            Find
                        </div>
                        <div className="search__form__term">
                            <input type="text" className="form-control" placeholder="all events"
                                   onInput={(e: FormEvent<HTMLInputElement>) => {
                                       this.setState({ term: e.currentTarget.value });
                                       this.props.onChange(e.currentTarget.value, this.state.city);
                                   }} />
                        </div>
                        <div className="search__form__label">
                            around
                        </div>
                        <div className="search__form__city">
                            <div className="autocomplete">
                                <Autocomplete
                                    getItemValue={(item: ApiCity) => item.name}
                                    value={this.state.cityTerm}
                                    items={this.state.cityResults}
                                    onChange={(e: any) => {
                                        this.setState({ cityTerm: e.target.value });
                                        this.search(e.target.value);
                                    }}
                                    onSelect={(name: string, item: ApiCity) => {
                                        this.setState({ cityTerm: item.name, city: item });
                                        this.props.onChange(this.state.cityTerm, item);
                                    }}
                                    renderMenu={children => {
                                        if (!children.length) {
                                            return <div />;
                                        }

                                        return (
                                            <div className="autocomplete__chooser">
                                                {children}
                                            </div>
                                        );
                                    }}
                                    renderItem={(item: ApiCity, active: boolean) =>
                                        <div key={item.uuid}
                                             className={'autocomplete__item '+(active ? 'autocomplete__item--active' : '')}>
                                            {item.name}
                                        </div>
                                    }
                                    inputProps={{
                                        className: 'form-control',
                                        placeholder: 'City'
                                    }}
                                />
                            </div>
                        </div>
                        <div className="search__form__button">
                            <button type="button" className="btn btn-outline-primary"
                                    disabled={this.state.city === null}>
                                Search
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
