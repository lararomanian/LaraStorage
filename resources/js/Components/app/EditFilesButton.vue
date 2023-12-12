<!-- <template>
    <button @click="onClick"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white mr-3">
        Edit
    </button>

    <EditFilesModal v-model="showEmailsModal" :file="latest_file" :all-selected="allSelected"  :selected-ids="selectedIds" />
</template>

<script setup>
// Imports
import {ref, onMounted} from "vue";
import ConfirmationDialog from "@/Components/ConfirmationDialog.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import {showErrorDialog, showSuccessNotification} from "@/event-bus.js";
import ShareFilesModal from "@/Components/app/ShareFilesModal.vue";
import EditFilesModal from "@/Components/app/EditFilesModal.vue";
import { httpGet, httpPost } from "@/Helper/http-helper.js";

// Uses
const page = usePage();
const form = useForm({
    all: null,
    ids: [],
    parent_id: null
})
const latest_file = ref(null);

// Refs

const showEmailsModal = ref(false)

// Props & Emit

const props = defineProps({
    allSelected: {
        type: Boolean,
        required: false,
        default: false
    },
    selectedIds: {
        type: Array,
        required: false
    },
    file: {
        type: Object,
        required: false
    }
})
const emit = defineEmits(['restore'])

// Computed

// Methods

async function onClick() {
    try {
        const response = await httpGet('getLatestEntry/' + props.file.id);
        const latestEntry = response.data;
        latest_file.value = latestEntry;
        console.log('Latest Entry:', latestEntry);

        showEmailsModal.value = true;
    } catch (error) {
        console.error('Error fetching latest entry:', error);
    }
}


// Hooks
onMounted(() => {
    console.log("editing", props.value);
})

</script>
 -->


 <template>
    <button @click="onClick"
            class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white mr-3">
<!-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2">
            <path fill-rule="evenodd"
                  d="M15.75 4.5a3 3 0 11.825 2.066l-8.421 4.679a3.002 3.002 0 010 1.51l8.421 4.679a3 3 0 11-.729 1.31l-8.421-4.678a3 3 0 110-4.132l8.421-4.679a3 3 0 01-.096-.755z"
                  clip-rule="evenodd"/>
        </svg> -->
        Edit
    </button>

    <EditFilesModal v-model="showEmailsModal" :file="file" :all-selected="allSelected"  :selected-ids="selectedIds" />
</template>

<script setup>
// Imports
import {ref, onMounted} from "vue";
import ConfirmationDialog from "@/Components/ConfirmationDialog.vue";
import {useForm, usePage} from "@inertiajs/vue3";
import {showErrorDialog, showSuccessNotification} from "@/event-bus.js";
import ShareFilesModal from "@/Components/app/ShareFilesModal.vue";
import EditFilesModal from "@/Components/app/EditFilesModal.vue";

// Uses
const page = usePage();
const form = useForm({
    all: null,
    ids: [],
    parent_id: null
})


// Refs

const showEmailsModal = ref(false)

// Props & Emit

const props = defineProps({
    allSelected: {
        type: Boolean,
        required: false,
        default: false
    },
    selectedIds: {
        type: Array,
        required: false
    },
    file: {
        type: Object,
        required: false
    }
})
const emit = defineEmits(['restore'])

// Computed

// Methods

function onClick() {
    // if (!props.allSelected && !props.selectedIds.length) {
    //     showErrorDialog('Please select at least one file to share')
    //     return
    // }
    showEmailsModal.value = true;
    console.log("editing", props.value);
}


// Hooks
onMounted(() => {
    console.log("editing", props.value);
})

</script>

