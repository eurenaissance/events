import React, {Component} from 'react';
import {dom} from '../../dom/dom';
import {ApiCity} from '../../types';
import {api} from '../../api/api';
import {Canceler} from 'axios';

interface Props {
    id: string | null,
    name: string | null,
    className: string | null,
    value: string,
    countryField: HTMLInputElement,
    zipCodeField: HTMLInputElement,
}

interface State {
    country: string,
    zipCode: string,
    loading: boolean,
    cities: ApiCity[],
}

export class CityAutocomplete extends Component<Props, State> {
    private cancelRequest: null | Canceler = null;

    constructor(props: Props) {
        super(props);

        this.state = {
            country: '',
            zipCode: '',
            loading: false,
            cities: [],
        };
    }

    componentDidMount() {
        this.setState({
            country: this.props.countryField.value,
            zipCode: this.props.zipCodeField.value,
        });

        this.refreshList(this.props.countryField.value, this.props.zipCodeField.value);

        dom.on(this.props.countryField, 'input', () => {
            this.setState({ country: this.props.countryField.value });
            this.refreshList(this.props.countryField.value, this.props.zipCodeField.value);
        });

        dom.on(this.props.zipCodeField, 'input', () => {
            this.setState({ zipCode: this.props.zipCodeField.value });
            this.refreshList(this.props.countryField.value, this.props.zipCodeField.value);
        });
    }

    refreshList(country: string, zipCode: string) {
        if (!country || !zipCode) {
            return;
        }

        if (this.cancelRequest) {
            this.cancelRequest();
        }

        this.setState({ loading: true });

        const request = api.cityAutocomplete(country.toUpperCase(), zipCode, (canceler) => this.cancelRequest = canceler);

        request.then(response => {
            this.cancelRequest = null;
            this.setState({ cities: response.data, loading: false });
        });

        request.catch(() => {
            this.cancelRequest = null;
            this.setState({ cities: [], loading: false });
        });
    }

    render() {
        return (
            <select id={this.props.id ? this.props.id: ''}
                    name={this.props.name ? this.props.name : ''}
                    className={this.props.className ? this.props.className : ''}
                    defaultValue={this.props.value}
                    disabled={this.state.loading || !this.state.cities.length}>

                {this.state.cities.map(city => {
                    return (
                        <option value={city.uuid} key={city.uuid}>
                            {city.name}
                        </option>
                    );
                })}

            </select>
        );
    }
}
