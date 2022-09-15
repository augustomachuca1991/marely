<div class="flex lg:justify-end">
    <div>
        <div class="sans-serif antialiased">
            <div x-data="appFrom()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="container mx-auto px-4 py-2 md:py-10">
                    <div class="mb-5 w-64">
                        <label for="datepicker"
                            class="mb-1 block text-sm font-medium text-gray-700">{{ __('Date From') }}</label>
                        <div class="relative">
                            <input type="hidden" name="date" x-ref="date" :value="datepickerValueFrom" />
                            <input type="text" x-on:click="showDatepickerFrom = !showDatepickerFrom"
                                x-model="datepickerValueFrom" x-on:keydown.escape="showDatepickerFrom = false"
                                class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Select date" readonly />

                            <div class="absolute top-0 right-0 px-3 py-2">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <div class="absolute top-0 left-0 z-10 mt-12 rounded-lg bg-white p-4 shadow"
                                style="width: 17rem" x-show.transition="showDatepickerFrom"
                                @click.away="showDatepickerFrom = false">
                                <div class="mb-2 flex items-center justify-between">
                                    <div>
                                        <span x-text="MONTH_NAMES[month]"
                                            class="text-lg font-bold text-gray-800"></span>
                                        <span x-text="year" class="ml-1 text-lg font-normal text-gray-600"></span>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-gray-100 focus:outline-none"
                                            @click="if (month == 0) {
												year--;
												month = 12;
											} month--; getNoOfDays()">
                                            <svg class="inline-flex h-6 w-6 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button type="button"
                                            class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-gray-100 focus:outline-none"
                                            @click="if (month == 11) {
												month = 0;
												year++;
											} else {
												month++;
											} getNoOfDays()">
                                            <svg class="inline-flex h-6 w-6 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="-mx-1 mb-3 flex flex-wrap">
                                    <template x-for="(day, index) in DAYS" :key="index">
                                        <div style="width: 14.26%" class="px-0.5">
                                            <div x-text="day" class="text-center text-xs font-medium text-gray-800">
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div class="-mx-1 flex flex-wrap">
                                    <template x-for="blankday in blankdays">
                                        <div style="width: 14.28%"
                                            class="border border-transparent p-1 text-center text-sm"></div>
                                    </template>
                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                        <div style="width: 14.28%" class="mb-1 px-1">
                                            <div @click="getDateValueFrom(date)" x-text="date"
                                                class="cursor-pointer rounded-full text-center text-sm leading-none transition duration-100 ease-in-out"
                                                :class="{
                                                    'bg-indigo-200': isToday(date) == true,
                                                    'text-gray-600 hover:bg-indigo-200': isToday(date) == false &&
                                                        isSelectedDateFrom(date) == false,
                                                    'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDateFrom(
                                                            date) ==
                                                        true
                                                }">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div>
        <div class="sans-serif antialiased">
            <div x-data="appTo()" x-init="[initDate(), getNoOfDays()]" x-cloak>
                <div class="container mx-auto px-4 py-2 md:py-10">
                    <div class="mb-5 w-64">
                        <label for="datepicker"
                            class="mb-1 block text-sm font-medium text-gray-700">{{ __('Date To') }}</label>
                        <div class="relative">
                            <input type="hidden" name="date" x-ref="date" :value="datepickerValue" />
                            <input type="text" x-on:click="showDatepicker = !showDatepicker"
                                x-model="datepickerValue" x-on:keydown.escape="showDatepicker = false"
                                class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm"
                                placeholder="Select date" readonly />

                            <div class="absolute top-0 right-0 px-3 py-2">
                                <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <div class="absolute top-0 left-0 z-10 mt-12 rounded-lg bg-white p-4 shadow"
                                style="width: 17rem" x-show.transition="showDatepicker"
                                @click.away="showDatepicker = false">
                                <div class="mb-2 flex items-center justify-between">
                                    <div>
                                        <span x-text="MONTH_NAMES[month]"
                                            class="text-lg font-bold text-gray-800"></span>
                                        <span x-text="year" class="ml-1 text-lg font-normal text-gray-600"></span>
                                    </div>
                                    <div>
                                        <button type="button"
                                            class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-gray-100 focus:outline-none"
                                            @click="if (month == 0) {
												year--;
												month = 12;
											} month--; getNoOfDays()">
                                            <svg class="inline-flex h-6 w-6 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 19l-7-7 7-7" />
                                            </svg>
                                        </button>
                                        <button type="button"
                                            class="focus:shadow-outline inline-flex cursor-pointer rounded-full p-1 transition duration-100 ease-in-out hover:bg-gray-100 focus:outline-none"
                                            @click="if (month == 11) {
												month = 0;
												year++;
											} else {
												month++;
											} getNoOfDays()">
                                            <svg class="inline-flex h-6 w-6 text-gray-400" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>

                                <div class="-mx-1 mb-3 flex flex-wrap">
                                    <template x-for="(day, index) in DAYS" :key="index">
                                        <div style="width: 14.26%" class="px-0.5">
                                            <div x-text="day" class="text-center text-xs font-medium text-gray-800">
                                            </div>
                                        </div>
                                    </template>
                                </div>

                                <div class="-mx-1 flex flex-wrap">
                                    <template x-for="blankday in blankdays">
                                        <div style="width: 14.28%"
                                            class="border border-transparent p-1 text-center text-sm">
                                        </div>
                                    </template>
                                    <template x-for="(date, dateIndex) in no_of_days" :key="dateIndex">
                                        <div style="width: 14.28%" class="mb-1 px-1">
                                            <div @click="getDateValue(date)" x-text="date"
                                                class="cursor-pointer rounded-full text-center text-sm leading-none transition duration-100 ease-in-out"
                                                :class="{
                                                    'bg-indigo-200': isToday(date) == true,
                                                    'text-gray-600 hover:bg-indigo-200': isToday(date) == false &&
                                                        isSelectedDate(date) == false,
                                                    'bg-indigo-500 text-white hover:bg-opacity-75': isSelectedDate(
                                                            date) ==
                                                        true
                                                }">
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <x-jet-input-error for="to" />
    </div>
</div>



<script>
    const MONTH_NAMES = [
        "Enero",
        "Febrero",
        "Marzo",
        "Abril",
        "Mayo",
        "Junio",
        "Julio",
        "Agosto",
        "Septiembre",
        "Octubre",
        "Noviembre",
        "Diciembre",
    ];
    const MONTH_SHORT_NAMES = [
        "Ene",
        "Feb",
        "Mar",
        "Abr",
        "May",
        "Jun",
        "Jul",
        "Ago",
        "Sep",
        "Oct",
        "Nov",
        "Dic",
    ];
    const DAYS = ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"];

    function appFrom() {
        return {
            showDatepickerFrom: false,
            datepickerValueFrom: "",
            selectedDate: "",
            dateFormat: "DD-MM-YYYY",
            month: "",
            year: "",
            no_of_days: [],
            blankdays: [],
            initDate() {
                let today;
                if (this.selectedDate) {
                    today = new Date(Date.parse(this.selectedDate));
                } else {
                    today = new Date();
                }
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValueFrom = this.formatDateForDisplay(
                    today
                );
            },
            formatDateForDisplay(date) {
                let formattedDay = DAYS[date.getDay()];
                let formattedDate = ("0" + date.getDate()).slice(
                    -2
                ); // appends 0 (zero) in single digit date
                let formattedMonth = MONTH_NAMES[date.getMonth()];
                let formattedMonthShortName =
                    MONTH_SHORT_NAMES[date.getMonth()];
                let formattedMonthInNumber = (
                    "0" +
                    (parseInt(date.getMonth()) + 1)
                ).slice(-2);
                let formattedYear = date.getFullYear();
                if (this.dateFormat === "DD-MM-YYYY") {
                    return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                }
                if (this.dateFormat === "YYYY-MM-DD") {
                    return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                }
                if (this.dateFormat === "D d M, Y") {
                    return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                }
                return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
            },
            isSelectedDateFrom(date) {
                const d = new Date(this.year, this.month, date);
                return this.datepickerValueFrom ===
                    this.formatDateForDisplay(d) ?
                    true :
                    false;
            },
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);
                return today.toDateString() === d.toDateString() ?
                    true :
                    false;
            },
            getDateValueFrom(date) {
                let selectedDate = new Date(
                    this.year,
                    this.month,
                    date
                );
                this.datepickerValueFrom = this.formatDateForDisplay(
                    selectedDate
                );
                @this.set('from', this.datepickerValueFrom)
                // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                window.livewire.emit('selectedFrom', this.datepickerValueFrom)
                this.isSelectedDateFrom(date);
                this.showDatepickerFrom = false;
            },
            getNoOfDays() {
                let daysInMonth = new Date(
                    this.year,
                    this.month + 1,
                    0
                ).getDate();
                // find where to start calendar day of week
                let dayOfWeek = new Date(
                    this.year,
                    this.month
                ).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }
                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }
                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },
        };
    }

    function appTo() {
        return {
            showDatepicker: false,
            datepickerValue: "",
            selectedDate: "",
            dateFormat: "DD-MM-YYYY",
            month: "",
            year: "",
            no_of_days: [],
            blankdays: [],
            initDate() {
                let today;
                if (this.selectedDate) {
                    today = new Date(Date.parse(this.selectedDate));
                } else {
                    today = new Date();
                }
                this.month = today.getMonth();
                this.year = today.getFullYear();
                this.datepickerValue = this.formatDateForDisplay(
                    today
                );
            },
            formatDateForDisplay(date) {
                let formattedDay = DAYS[date.getDay()];
                let formattedDate = ("0" + date.getDate()).slice(
                    -2
                ); // appends 0 (zero) in single digit date
                let formattedMonth = MONTH_NAMES[date.getMonth()];
                let formattedMonthShortName =
                    MONTH_SHORT_NAMES[date.getMonth()];
                let formattedMonthInNumber = (
                    "0" +
                    (parseInt(date.getMonth()) + 1)
                ).slice(-2);
                let formattedYear = date.getFullYear();
                if (this.dateFormat === "DD-MM-YYYY") {
                    return `${formattedDate}-${formattedMonthInNumber}-${formattedYear}`; // 02-04-2021
                }
                if (this.dateFormat === "YYYY-MM-DD") {
                    return `${formattedYear}-${formattedMonthInNumber}-${formattedDate}`; // 2021-04-02
                }
                if (this.dateFormat === "D d M, Y") {
                    return `${formattedDay} ${formattedDate} ${formattedMonthShortName} ${formattedYear}`; // Tue 02 Mar 2021
                }
                return `${formattedDay} ${formattedDate} ${formattedMonth} ${formattedYear}`;
            },
            isSelectedDate(date) {
                const d = new Date(this.year, this.month, date);
                return this.datepickerValue ===
                    this.formatDateForDisplay(d) ?
                    true :
                    false;
            },
            isToday(date) {
                const today = new Date();
                const d = new Date(this.year, this.month, date);
                return today.toDateString() === d.toDateString() ?
                    true :
                    false;
            },
            getDateValue(date) {
                let selectedDate = new Date(
                    this.year,
                    this.month,
                    date
                );
                this.datepickerValue = this.formatDateForDisplay(
                    selectedDate
                );
                @this.set('to', this.datepickerValue)
                // this.$refs.date.value = selectedDate.getFullYear() + "-" + ('0' + formattedMonthInNumber).slice(-2) + "-" + ('0' + selectedDate.getDate()).slice(-2);
                window.livewire.emit('selectedTo', this.datepickerValue)
                this.isSelectedDate(date);
                this.showDatepicker = false;
            },
            getNoOfDays() {
                let daysInMonth = new Date(
                    this.year,
                    this.month + 1,
                    0
                ).getDate();
                // find where to start calendar day of week
                let dayOfWeek = new Date(
                    this.year,
                    this.month
                ).getDay();
                let blankdaysArray = [];
                for (var i = 1; i <= dayOfWeek; i++) {
                    blankdaysArray.push(i);
                }
                let daysArray = [];
                for (var i = 1; i <= daysInMonth; i++) {
                    daysArray.push(i);
                }
                this.blankdays = blankdaysArray;
                this.no_of_days = daysArray;
            },
        };
    }
</script>
