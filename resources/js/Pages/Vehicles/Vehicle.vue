<script setup>
import { useForm, Head } from "@inertiajs/inertia-vue3";

import Swal from "sweetalert2/dist/sweetalert2";
import "sweetalert2/dist/sweetalert2.css";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { Link } from "@inertiajs/inertia-vue3";

defineProps(["vehicle"]);

const form = useForm({
    model: "",
    brand_id: "",
    type_id: "",
    year: "",
    plate: "",
    version: "",
    user_id: "",
    });

const deleteProduct = (id) => {
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
};

</script>

<template>

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
        <Link           
            as="button"
            type="button"
            :href="route('vehicles.edit', vehicle.id)">
            <PrimaryButton class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                Edit
            </PrimaryButton>
        </Link>
        <form @submit.prevent="deleteProduct(vehicle.id)">
            <PrimaryButton class="font-medium text-red-600 dark:text-red-500 hover:underline">
                Delete
            </PrimaryButton>
        </form>
    </td>
    
</tr>
       

</template>
