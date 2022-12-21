import axios from 'axios'
import { ref } from 'vue'

export default function useVehicles () {

    const vehicles = ref([])

    const getVehicles = async () => {
        let response = await axios.get('/api/vehicles')
        console.log('vehicles response.data = ', response.data)

        vehicles.value = response.data.data;

        console.log('vehicles.value = ', vehicles.value)

    }

    console.log('chamou o script')
    console.log('vehicles', vehicles)
    return {
        vehicles,
        getVehicles
    }
}