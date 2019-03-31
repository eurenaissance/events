export interface ApiCity {
    uuid: string,
    name: string,
}

export interface ApiGroup {
    uuid: string,
    name: string,
    slug: string,
    address: string,
    city: ApiCity,
    membersCount: number,
}

export interface ApiEvent {
    name: string,
    slug: string,
    date: {
        day: number,
        month: number,
        full: string,
    },
    group: ApiGroup,
    address: string,
    city: ApiCity,
    creatorName: string,
}
