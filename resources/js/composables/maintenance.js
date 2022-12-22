import axios from 'axios'
import { ref } from 'vue'

export default function useMaintenance () {

    const maintenances = ref([])

    const maintenancesVehicle = ref([])


    const getMaintenance = async () => {
        let response = await axios.get('/api/maintenances')

        console.log('response', response)

        maintenances.value = response.data.data;

        maintenancesVehicle.value = response.data.vehicle;


        console.log(maintenances.value)

    }


    return {
        maintenances,
        maintenancesVehicle,
        getMaintenance
    }
}