<template>
    <div class="flex h-screen bg-gray-200 font-roboto">
  
      <div class="flex-1 flex flex-col overflow-hidden">
        <Header />
  
        <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
          <div class="container mx-auto px-6 py-8">

            <a :href="route('maintenance.create')" class="mb-10 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Cadastrar Manutenção</a>


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
                                Ano
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <p class="w-full text-lg text-left text-gray-500 dark:text-gray-400" v-if="maintenances.length === 0">Nenhuma manutenção foi encontrada!</p>

                        <Maintenance
                            v-for="maintenance in maintenances"
                            :key="maintenance.id"
                            :maintenance="maintenance"
                        />  
                     
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
  import NavLink from "@/Components/NavLink.vue";
  import { useForm, Head } from "@inertiajs/inertia-vue3";

  import Header from "../../Components/Header.vue";
  import Maintenance from "../Maintenance/Maintenance.vue";


  defineProps(["maintenances"]);

  const form = useForm({
    name: "",
    code: "",
    price: "",
    image: "",
    });

  </script>