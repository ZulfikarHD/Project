<script>
import FullCalendar from '@fullcalendar/vue3'
import dayGridPlugin from '@fullcalendar/daygrid'
import interactionPlugin from '@fullcalendar/interaction'
import timeGridPlugin from '@fullcalendar/timegrid'
import multiMonthPlugin from '@fullcalendar/multimonth'
import idLocale from '@fullcalendar/core/locales/id'

export default {
    components: {
        FullCalendar
    },
    data() {
        return {
            events: [
                { title: 'Event 1', date: '2024-07-08' },
                { title: 'Event 2', date: '2024-07-09' }
            ],
            calendarOptions: {
                plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin, multiMonthPlugin],
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay,multiMonthYear'
                },
                locale: idLocale // Set locale to Indonesian
            }
        }
    },
    methods: {
        handleDateClick(info) {
            const title = prompt('Enter event title:');
            if (title) {
                this.events.push({
                    title,
                    start: info.dateStr
                });
            }
        }
    }
}
</script>

<template>
    <FullCalendar :options="calendarOptions" :events="events" @dateClick="handleDateClick" />
</template>

<style>
/* Custom styles for FullCalendar buttons */
.fc .fc-toolbar {
    align-items: center;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
}

.fc .fc-button-primary {
    background-color: #84cc16; /* Tailwind CSS green-600 */
    border-color: #84cc16 ; /* Tailwind CSS green-600 */
    color: white;
}

.fc .fc-button-primary:disabled {
    background-color: #84cc16; /* Tailwind CSS green-600 */
    border-color: #84cc16 ; /* Tailwind CSS green-600 */
    color: white;
}

.fc .fc-button-primary:hover {
    background-color: #65a30d; /* Tailwind CSS green-700 for hover effect */
    border-color: #65a30d; /* Tailwind CSS green-700 for hover effect */
}

.fc .fc-button-active {
    background-color: #65a30d !important; /* Tailwind CSS green-700 for hover effect */
    border-color: #65a30d !important; /* Tailwind CSS green-700 for hover effect */
}
.fc .fc-button-primary:focus {
    background-color: #65a30d !important; /* Tailwind CSS green-700 for hover effect */
    border-color: #65a30d !important; /* Tailwind CSS green-700 for hover effect */
}
</style>
