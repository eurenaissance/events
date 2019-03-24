import React from 'react';
import {render} from 'react-dom';
import {dom} from '../../dom/dom';
import {Page} from './components/Page';

render(<Page />, dom.find('#search-events'));
