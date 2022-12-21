<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">

            <a :href="route('vehicles.create')" class="mb-10 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Adicionar Veículo</a>


            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Modelo
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Marca
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Tipo
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Versão
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Placa
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ano
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <p class="w-full text-lg text-left text-gray-500 dark:text-gray-400" v-if="vehicles.length === 0">Nenhum veículo foi encontrado!</p>

                        <template class="" v-for="vehicle in vehicles" :key="vehicle.id">
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ vehicle.model }}
                                </th>

                                <td class="py-4 px-6">
                                    {{ vehicle.brand.name }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ vehicle.vehicle_type.name }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ vehicle.version }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ vehicle.plate }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ vehicle.year }}
                                </td>

                                <td class="py-4 px-6">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2" :href="route('vehicles.edit', vehicle.id)">Edit</a>
                                    <a class="font-medium text-red-600 dark:text-red-500 hover:underline" @click="deleteVehicle(vehicle.id)"> Delete </a>
                                </td>
    
                            </tr>
                        </template>

                    </tbody>
                </table>
            </div>

          </div>
        </main>
      </div>
    </div>
  </template>
  
  <script lang="ts">
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import { useForm, Head } from "@inertiajs/inertia-vue3";

  import Header from "../../Components/Header.vue";
  import useVehicles from "@/composables/vehicles";
  import { onMounted } from "vue";

  import { Link } from "@inertiajs/inertia-vue3";
//   import route from "vendor/tightenco/ziggy/src/js";
  import Swal from "sweetalert2/dist/sweetalert2";
  import "sweetalert2/dist/sweetalert2.css";

  //defineProps(["vehicles"]);

  const form = useForm({
    model: "",
    brand_id: "",
    type_id: "",
    year: "",
    plate: "",
    version: "",
    user_id: "",
    });

    

    export default {
        components: {
            Header: Header,
            Swal: Swal,
            PrimaryButton: PrimaryButton,
            form: form
        },
        methods: {
            deleteVehicle: 
                function deleteVehicle(id) {
                    Swal.fire({
                        title: "Você tem certeza?",
                        text: "O veículo será excluído definitivamente!",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonText: "Cancelar",
                        confirmButtonText: "Sim, excluir!",
                        }).then((result) => {
                            if (result.value) {
                            form.delete(route("vehicles.destroy", id), {
                                onSuccess: () =>
                                Swal.fire("Excluído", "Veículo removido com sucesso!", "success"),
                                onError: () =>
                                Swal.fire("Falhou!", "Algo de errado aconteceu.", "Warning"),
                            });
                            }
                    });
                }
        },
        setup() {

            const { vehicles, getVehicles } = useVehicles()

            onMounted(getVehicles)

            console.log('vehicles na view = ', vehicles)

            return {
                vehicles,
            }
        }
    }

  </script>