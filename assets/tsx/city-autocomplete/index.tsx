import React from 'react';
import {render} from 'react-dom';
import {dom} from '../dom/dom';
import {CityAutocomplete} from './components/CityAutocomplete';

dom.findAll<HTMLInputElement>('.city-autocomplete').forEach(field => {
    const zipCodeFieldName = field.getAttribute('data-zip-code-field');
    const countryFieldName = field.getAttribute('data-country-field');
    if (!zipCodeFieldName || !countryFieldName) {
        return;
    }

    const zipCodeField = dom.find<HTMLInputElement>('[name="'+zipCodeFieldName+'"]');
    const countryField = dom.find<HTMLInputElement>('[name="'+countryFieldName+'"]');
    if (!zipCodeField || !countryField) {
        return;
    }

    const wrapper = dom.createWrapper(field);

    field.classList.remove('city-autocomplete');

    render(
        <CityAutocomplete
            id={field.getAttribute('id')}
            name={field.getAttribute('name')}
            className={field.className}
            value={field.value}
            countryField={countryField}
            zipCodeField={zipCodeField}
        />,
        wrapper
    );
});
