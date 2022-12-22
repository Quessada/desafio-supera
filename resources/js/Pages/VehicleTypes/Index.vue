<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">

            <a :href="route('vehicleTypes.create')" class="mb-10 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cadastrar Tipo</a>

            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-white uppercase bg-gray-50 dark:bg-gray-700 dark:text-white">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Tipo
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <p class="w-full text-lg text-left text-gray-500 dark:text-gray-400" v-if="vehicleTypes.length === 0">Nenhuma manutenção foi encontrada!</p>

                        <template class="" v-for="vehicleType in vehicleTypes" :key="vehicleType.id">
                            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ vehicleType.name }}
                                </th>
     
                                <td class="py-4 px-6">
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-2" :href="route('vehicleTypes.edit', vehicleType.id)">Edit</a>
                                    <a class="font-medium text-red-600 dark:text-red-500 hover:underline" @click="deleteVehicleTypes(vehicleType.id)"> Delete </a>
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

  import Header from "../../Components/Header.vue";

  import Swal from "sweetalert2/dist/sweetalert2";
  import "sweetalert2/dist/sweetalert2.css";
  import { useForm } from "@inertiajs/inertia-vue3";

  const form = useForm({
        name: "",
        code: "",
        price: "",
        image: "",
    });

   defineProps(["vehicleTypes"]);

    function deleteVehicleTypes(id) {
        Swal.fire({
            title: "Você tem certeza?",
            text: "O tipo será excluído definitivamente!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonText: "Cancelar",
            confirmButtonText: "Sim, excluir!",
            }).then((result) => {
                if (result.value) {
                form.delete(route("vehicleTypes.destroy", id), {
                    onSuccess: () =>
                    Swal.fire("Excluído", "Tipo removido com sucesso!", "success"),
                    onError: () =>
                    Swal.fire("Falhou!", "Algo de errado aconteceu.", "Warning"),
                });
                }
        });
    }

  </script>