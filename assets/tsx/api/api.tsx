import axios, {AxiosPromise, AxiosRequestConfig, Canceler} from 'axios';
import {ApiCity} from '../types';

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
}

export const api = new Api();
