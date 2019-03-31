import React, {Component} from 'react';
import {Canceler} from 'axios';
import {data} from '../../../data/readDataTag';
import {Form} from './Form';
import {ApiCity, ApiGroup} from '../../../types';
import {api} from '../../../api/api';

const exposed = data.readExposedData();
const defaultCity = exposed.user.city;
const translations = exposed.translations;

interface State {
    isLoading: boolean,
    results: ApiGroup[],
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
            this.cancelRequest('canceled');
        }

        this.setState({ isLoading: true });

        const request = api.searchGroup(term, city, cancel => this.cancelRequest = cancel);

        request.then(response => {
            this.setState({ isLoading: false, results: response.data });
            this.cancelRequest = null;
        });

        request.catch(({ message }) => {
            if (message === 'canceled') {
                return;
            }

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

                        {!this.state.results.length ? '' : this.state.results.map(group => {
                            return (
                                <div className="col-md-4 mb-3" key={group.slug}>
                                    <div className="card card--group mb-3">
                                        <h4 className="card__title">
                                            <a href={'/group/'+group.slug} target="_blank">
                                                {group.name}
                                            </a>
                                        </h4>

                                        <div className="card__subtitle">
                                            {group.followers + ' '}
                                            {translations['group_search.followers']}
                                        </div>

                                        <div className="address mt-4">
                                            <div className="address__icon">
                                                <i className="fas fa-map-marker-alt"></i>
                                            </div>
                                            <div className="address__text">
                                                <div className="address__text__street">
                                                    <a href={'https://maps.google.com/?q='+group.address+' '+group.city.name}
                                                       target="_blank">
                                                        {group.address}
                                                    </a>
                                                </div>
                                                <div className="address__text__city">
                                                    {group.city.name}
                                                </div>
                                            </div>
                                        </div>

                                        <div className="mt-4 text-right">
                                            <a href={'/group/'+group.slug} target="_blank"
                                               className="d-inline-flex align-items-center">
                                                {translations['group_card.learn_more']}
                                                <i className="fas fa-caret-right ml-2"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            );
                        })}

                        {!this.state.results.length && !this.state.isLoading ? (
                            <div className="text-center col-12">
                                <h4>
                                    {translations['group_search.no_result.title']}
                                </h4>

                                <p>
                                    {translations['group_search.no_result.text']}
                                </p>

                                <a href="/group/create" className="btn btn-primary">
                                    {translations['group_search.no_result.button']}
                                </a>
                            </div>
                        ) : ''}
                    </div>
                </div>
            </div>
        );
    }
}
