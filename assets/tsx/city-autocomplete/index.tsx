import React from 'react';
import {dom} from '../dom/dom';
import {render} from 'react-dom';
import {CityAutocomplete} from './components/CityAutocomplete';

dom.findAll('.city-autocomplete').forEach(field => {
    const zipCodeFieldName = field.getAttribute('data-zip-code-field');
    if (!zipCodeFieldName) {
        return;
    }

    const zipCodeField = dom.find<HTMLInputElement>('input[name="'+zipCodeFieldName+'"]');
    if (!zipCodeField) {
        return;
    }

    const wrapper = dom.createWrapper(field);

    render(
        <CityAutocomplete
            id={field.getAttribute('id')}
            name={field.getAttribute('name')}
            className={field.getAttribute('class')}
            zipCodeField={zipCodeField}
        />,
        wrapper
    );
});
