import React, {Component} from 'react';
import {Canceler} from 'axios';
import {data} from '../../../data/readDataTag';
import {Form} from './Form';
import {ApiCity, ApiEvent} from '../../../types';
import {api} from '../../../api/api';

const exposed = data.readExposedData();
const defaultCity = exposed.default_city;

interface State {
    isLoading: boolean,
    results: ApiEvent[],
}

export class Page extends Component<{}, State> {
    private cancelRequest: Canceler | null = null;

    constructor(props: {}) {
        super(props);

        this.state = {
            isLoading: false,
            results: [],
        };
    }

    componentDidMount(): void {
        this.search('', defaultCity);
    }

    search(term: string, city: ApiCity | null) {
        if (this.cancelRequest) {
            this.cancelRequest();
        }

        this.setState({ isLoading: true });

        const request = api.searchEvent(term, city, cancel => this.cancelRequest = cancel);

        request.then(response => {
            this.setState({ isLoading: false, results: response.data });
            this.cancelRequest = null;
        });

        request.catch(() => {
            this.setState({ isLoading: false });
            this.cancelRequest = null;
        });
    }

    render() {
        return (
            <div className="row justify-content-center">
                <div className="col-lg-11">
                    <Form
                        defaultCity={defaultCity}
                        onChange={(term, city) => this.search(term, city)}
                    />

                    <div className="row mt-5">
                        {!this.state.results.length && this.state.isLoading ? (
                            [0, 1, 2].map(key => (
                                <div className="col-md-4" key={key}>
                                    <div className="card card--placeholder mb-3">
                                        <div className="card--placeholder__title"></div>
                                        <div className="card--placeholder__field"></div>
                                        <div className="card--placeholder__field"></div>
                                        <div className="card--placeholder__more-container">
                                            <div className="card--placeholder__more"></div>
                                        </div>
                                    </div>
                                </div>
                            ))
                        ) : ''}

                        {!this.state.results.length ? '' : this.state.results.map(event => {
                            return (
                                <div className="col-md-4 mb-3" key={event.slug}>
                                    <div className={'card card--event '+(this.state.isLoading ? 'card--loading' : '')}>
                                        <div className="card__row">
                                            <div className="card__date">
                                                <div className="card__date__day">
                                                    {event.date.day}
                                                </div>
                                                <div className="card__date__month">
                                                    {event.date.month}
                                                </div>
                                            </div>

                                            <h4 className="card__title">
                                                <a href={'/event/'+event.slug} target="_blank">
                                                    {event.name}
                                                </a>
                                            </h4>
                                        </div>

                                        <div className="card__calendar mt-4">
                                            <div className="card__calendar__icon">
                                                <i className="fas fa-calendar-alt"></i>
                                            </div>
                                            <div className="card__calendar__profile">
                                                {event.date.full}
                                            </div>
                                        </div>

                                        <div className="address mt-4" id="group-address">
                                            <div className="address__icon">
                                                <i className="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div className="address__text">
                                                <div className="address__text__street">
                                                    <a href={'https://maps.google.com/?q='+event.address+' '+event.city.name}
                                                       target="_blank">
                                                        {event.address}
                                                    </a>
                                                </div>
                                                <div className="address__text__city">
                                                    {event.city.name}
                                                </div>
                                            </div>
                                        </div>

                                        <div className="card__user mt-4">
                                            <div className="card__user__icon">
                                                <i className="fas fa-users"></i>
                                            </div>
                                            <div className="card__user__profile">
                                                <a href={'/group/'+event.group.slug}>
                                                    {event.group.name}
                                                </a>
                                            </div>
                                        </div>

                                        <div className="mt-4 text-right">
                                            <a href={'/event/'+event.slug} target="_blank"
                                               className="d-inline-flex align-items-center">
                                                Learn more
                                                <i className="fas fa-caret-right ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}
                    </div>
                </div>
            </div>
        );
    }
}
