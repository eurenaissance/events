import React from 'react';
import {render} from 'react-dom';
import {dom} from '../../dom/dom';
import {Form} from './components/Form';
import {ApiCity} from '../../types';

render(
    <Form
        defaultCity={null}
        onChange={(term: string, city: ApiCity | null) => { console.log(term, city); }}
    />,
    dom.find('#search-events')
);
