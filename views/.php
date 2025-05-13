<div>
    <!-- searchbar -->
    <form class="mx-auto w-full sm:w-1/2 mb-5">
        <div class="relative">
            <input type="text" placeholder="Search Attendees..." class="form-input shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] bg-white rounded-full h-11 placeholder:tracking-wider" x-model="search" />
            <button type="button" class="btn btn-primary absolute ltr:right-1 rtl:left-1 inset-y-0 m-auto rounded-full w-9 h-9 p-0 flex items-center justify-center">
                <svg> ... </svg>
            </button>
        </div>
    </form>

    <!-- result -->
    <div class="p-4 border border-white-dark/20 rounded-lg space-y-4 overflow-x-auto w-full block">
        <template x-for="item in searchResults">
            <div class="bg-white dark:bg-[#1b2e4b] rounded-xl shadow-[0_0_4px_2px_rgb(31_45_61_/_10%)] p-3 flex items-center justify-between
                        text-gray-500 font-semibold min-w-[625px] hover:text-primary transition-all duration-300 hover:scale-[1.01]">
                <div class="user-profile">
                    <img :src="`/assets/images/${item.thumb}`" alt="image" class="w-8 h-8 rounded-md object-cover" />
                </div>
                <div x-text="item.name"></div>
                <div x-text="item.email"></div>
                <div class="badge border-2 border-dashed" :class="item.statusClass" x-text="item.status"></div>
                <div class="cursor-pointer">
                    <svg> ... </svg>
                </div>
            </div>
        </template>
    </div>
</div>

<!-- script -->
<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("search", () => ({
            search: '',
            items: [{
                    thumb: 'profile-5.jpeg',
                    name: 'Jassa Rich',
                    email: 'alan@mail.com',
                    status: 'Active',
                    statusClass: 'badge badge-outline-primary'
                },
                {
                    thumb: 'profile-16.jpeg',
                    name: 'Linda Nelson',
                    email: 'Linda@mail.com',
                    status: 'Busy',
                    statusClass: 'badge badge-outline-danger'
                },
                {
                    thumb: 'profile-12.jpeg',
                    name: 'Lila Perry',
                    email: 'Lila@mail.com',
                    status: 'Closed',
                    statusClass: 'badge badge-outline-warning'
                },
                {
                    thumb: 'profile-3.jpeg',
                    name: 'Andy King',
                    email: 'Andy@mail.com',
                    status: 'Active',
                    statusClass: 'badge badge-outline-primary'
                },
                {
                    thumb: 'profile-16.jpeg',
                    name: 'Jesse Cory',
                    email: 'Jesse@mail.com',
                    status: 'Busy',
                    statusClass: 'badge badge-outline-danger'
                }
            ],

            get searchResults() {
                return this.items.filter(item => {
                    return item.name.toLowerCase().includes(this.search.toLowerCase()) || item.email.toLowerCase().includes(this.search.toLowerCase()) || item.status.toLowerCase().includes(this.search.toLowerCase());
                });
            }
        }));
    });
</script>