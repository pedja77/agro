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

    // getAllGalleries(params) {
    //     return this.client.get("/galleries", { params })
    // }
}

const filterService = new FilterService()

export { filterService as FilterService }
