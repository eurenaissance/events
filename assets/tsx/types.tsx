export interface ApiCity {
    uuid: string,
    name: string,
}

export interface ApiEvent {
    name: string,
    slug: string,
    date: {
        day: number,
        month: number,
        full: string,
    },
    group: {
        uuid: string,
        name: string,
        slug: string,
    },
    address: string | null,
    city: ApiCity,
}

export interface ApiGroup {
    name: string,
    slug: string,
    address: string | null,
    city: ApiCity,
    followers: number,
}
