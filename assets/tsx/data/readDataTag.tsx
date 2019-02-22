class Data {
    public readExposedData<T = any>(id: string = 'exposed_data'): T | null {
        const configTag = document.getElementById(id);
        if (!configTag) {
            return null;
        }

        return JSON.parse(configTag.innerText);
    }
}

export const data = new Data();
