import axios, {AxiosPromise, AxiosRequestConfig, Canceler} from 'axios';
import {ApiCity, ApiEvent, ApiGroup} from '../types';

export type HttpCanceler = (cancel: Canceler) => void;

class Api {
    public cityAutocomplete(country: string, zipCode: string, canceler?: HttpCanceler): AxiosPromise<ApiCity[]> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiCity[]>('/api/cities/autocomplete/'+country+'/'+zipCode, config);
    }

    public searchCity(term: string, canceler?: HttpCanceler): AxiosPromise<ApiCity[]> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiCity[]>('/api/search/cities?q='+term, config);
    }

    public searchEvent(term: string, city: ApiCity | null, canceler?: HttpCanceler): AxiosPromise<ApiEvent[]> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiEvent[]>('/api/search/events?q='+term+'&c='+(city ? city.uuid : ''), config);
    }

    public searchGroup(term: string, city: ApiCity | null, canceler?: HttpCanceler): AxiosPromise<ApiGroup[]> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiGroup[]>('/api/search/groups?q='+term+'&c='+(city ? city.uuid : ''), config);
    }
}

export const api = new Api();
