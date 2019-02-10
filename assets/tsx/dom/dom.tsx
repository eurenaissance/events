export class Dom {
    public find<T extends Element>(selector: string): T | null {
        return this.findIn(document, selector);
    }

    public findAll<T extends Element>(selector: string): T[] {
        return this.findAllIn(document, selector);
    }

    public findIn<T extends Element>(element: Document | Element, selector: string): T | null {
        return element.querySelector(selector);
    }

    public findAllIn<T extends Element>(element: Document | Element, selector: string): T[] {
        const nodes = element.querySelectorAll(selector);

        let items: T[] = [];
        [].forEach.call(nodes, (e: T) => items.push(e));

        return items;
    }

    public create<T extends HTMLElement = HTMLElement>(tagName: string, options?: ElementCreationOptions): T {
        return (document.createElement(tagName, options) as T);
    }

    public createWrapper(element: Element): HTMLDivElement {
        const parent = element.parentNode;
        if (!parent) {
            return this.create<HTMLDivElement>('div');
        }

        const wrapper = this.create<HTMLDivElement>('div');
        parent.appendChild(wrapper);

        parent.removeChild(element);
        wrapper.appendChild(element);

        return wrapper;
    }

    public on(element: Element, type: string, callback: EventListenerOrEventListenerObject) {
        element.addEventListener(type, callback);
    }
}

export const dom = new Dom();
