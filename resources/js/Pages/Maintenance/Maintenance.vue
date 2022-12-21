<script setup>
import { useForm, Head } from "@inertiajs/inertia-vue3";


defineProps(["maintenance"]);


</script>

<template>

<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
        {{ maintenance.description }}
    </th>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.model }}
    </td>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.brand.name }}
    </td>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.vehicle_type.name }}
    </td>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.version }}
    </td>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.plate }}
    </td>
    <td class="py-4 px-6">
        {{ maintenance.vehicle.year }}
    </td>

    <td class="py-4 px-6">
        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
        <a href="#" class="ml-5 font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
    </td>
    
</tr>


</template>
