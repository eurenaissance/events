import axios, {AxiosPromise, AxiosRequestConfig, Canceler} from 'axios';
import {ApiCity} from '../types';

export type HttpCanceler = (cancel: Canceler) => void;

class Api {
    public cityShow(uuid: string, canceler?: HttpCanceler): AxiosPromise<ApiCity> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiCity>('/api/city/'+uuid, config);
    }

    public cityAutocomplete(country: string, zipCode: string, canceler?: HttpCanceler): AxiosPromise<ApiCity[]> {
        let config: AxiosRequestConfig = {};
        if (canceler) {
            config.cancelToken = new axios.CancelToken(canceler);
        }

        return axios.get<ApiCity[]>('/api/city/autocomplete/'+country+'/'+zipCode, config);
    }
}

export const api = new Api();
