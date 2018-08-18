import Axios from "axios"

export default class FilterService {
    constructor() {
        this.client = new Axios.create({
            baseURL: "http://agrobearings.com/api"    // "http://localhost:8000/api/"
        })
    }

    getFilteredProducts(params) {
        console.log("enc", process.env.MIX_APP_URL)
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
