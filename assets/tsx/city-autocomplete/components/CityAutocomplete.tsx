import React, {Component} from 'react';

interface Props {
    id: string | null,
    name: string | null,
    className: string | null,
    zipCodeField: HTMLInputElement,
}

export class CityAutocomplete extends Component<Props, {}> {
    render() {
        return (
            <select id={this.props.id ? this.props.id: ''}
                    name={this.props.name ? this.props.name : ''}
                    className={this.props.className ? this.props.className : ''}
                    disabled={true}  />
        );
    }
}
