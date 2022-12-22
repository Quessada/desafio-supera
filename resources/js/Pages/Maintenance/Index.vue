<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">

            <a :href="route('maintenances.create')" class="mb-10 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cadastrar Manutenção</a>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Descrição
                            </th>
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
                                Data
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>

                        
                        <p class="w-full text-lg text-left text-gray-500 dark:text-gray-400" v-if="maintenances.length === 0">Nenhuma manutenção foi encontrada!</p>

                        <template class="" v-for="maintenance in maintenances" :key="maintenance.id">
                                                        
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700" v-if="compareDate(maintenance.date) == true">

                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ maintenance.description }}
                                </th>

                                <td class="py-4 px-6">
                                    {{ maintenance.vehicle.model }}
                                </td>

                                <template class="" v-for="vehicle in vehicles" :key="vehicle.id">

                                <!-- Marca -->
                                <td class="py-4 px-6" v-if="vehicle.id == maintenance.vehicle_id">
                                    {{ vehicle.brand.name }}
                                </td>

                                <!-- Tipo -->
                                <td class="py-4 px-6" v-if="vehicle.id == maintenance.vehicle_id">
                                    {{ vehicle.vehicle_type.name }}
                                </td>

                                </template>       

                                <td class="py-4 px-6">
                                    {{ maintenance.vehicle.version }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ maintenance.vehicle.plate }}
                                </td>

                                <td class="py-4 px-6">
                                    {{ formatDate(maintenance.date) }}
                                </td>

                                <td class="py-4 px-6">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2" :href="route('maintenances.edit', maintenance.id)">Edit</a>
                                    <a class="font-medium text-red-600 dark:text-red-500 hover:underline" @click="deleteMaintenance(maintenance.id)"> Delete </a>
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
  
  <script setup lang="ts">
  import PrimaryButton from "@/Components/PrimaryButton.vue";
  import { useForm } from "@inertiajs/inertia-vue3";

  import Header from "../../Components/Header.vue";
  import Maintenance from "../Maintenance/Maintenance.vue";

  import Swal from "sweetalert2/dist/sweetalert2";
  import "sweetalert2/dist/sweetalert2.css";
  
  import useMaintenance from "@/composables/maintenance";
  
  import { onMounted } from "vue";
  import moment from 'moment';

   defineProps(["maintenances", "vehicles"]);

    const form = useForm({
        name: "",
        code: "",
        price: "",
        image: "",
    });

    function deleteMaintenance(id) {
        Swal.fire({
            title: "Você tem certeza?",
            text: "A manutenção será excluída definitivamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sim, excluir!",
            }).then((result) => {
                if (result.value) {
                form.delete(route("maintenances.destroy", id), {
                    onSuccess: () =>
                    Swal.fire("Excluído", "Manutenção removida com sucesso!", "success"),
                    onError: () =>
                    Swal.fire("Falhou!", "Algo de errado aconteceu.", "Warning"),
                });
                }
        });
    }

    function compareDate (dateMaintenance) {

        var dateNow = moment()
        var dateInSevenDays = moment(dateNow).add(7, 'days')

        var dateMaintenanceMoment = moment(dateMaintenance)

        if((dateMaintenanceMoment.format('DD/MM/YY') >= dateNow.format('DD/MM/YY')) && (dateMaintenanceMoment.format('DD/MM/YY') <= dateInSevenDays.format('DD/MM/YY'))) {
            return true
        }
        else
            return false
    }


    const formatDate = (date) => {
        return moment(date).format('DD/MM/YY');
    }

  </script>