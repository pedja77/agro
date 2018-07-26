import Axios from "axios"

export default class FilterService {
    constructor() {
        this.client = new Axios.create({
            baseURL: "http://localhost:8000/api/"
        })
    }

    getFilteredProducts(params) {
        return this.client.get("/catalog", { params })
    }

    getTypes() {
        return this.client.get("/catalog/types")
    }

    getGroups() {
        return this.client.get("/catalog/groups")
    }

    getBoreDiameters() {
        return this.client.get("/bore-diameters")
    }

    // getAllGalleries(params) {
    //     return this.client.get("/galleries", { params })
    // }
}

const filterService = new FilterService()

export { filterService as FilterService }
