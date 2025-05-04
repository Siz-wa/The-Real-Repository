<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased" :class="[ $store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ?  'dark' : '', $store.app.menu, $store.app.layout,$store.app.rtlClass]">
    <div class="main-content flex flex-col min-h-screen">

        <div class="animate__animated p-6" :class="[$store.app.animation]">
            <!-- start main content section -->

            <div x-data="contacts">
                <div class="flex flex-wrap items-center justify-between gap-4">
                    <h2 class="text-xl">Bakery Products</h2>
                    <div class="flex w-full flex-col gap-4 sm:w-auto sm:flex-row sm:items-center sm:gap-3">
                        <div class="flex gap-3">
                            <div>
                                <button type="button" class="btn btn-primary" @click="editUser">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                        <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                        <path opacity="0.5" d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                    Add Products
                                </button>
                                <div class="fixed inset-0 z-[999] hidden overflow-y-auto bg-[black]/60" :class="addContactModal && '!block'">
                                    <div class="flex min-h-screen items-center justify-center px-4" @click.self="addContactModal = false">
                                        <div x-show="addContactModal" x-transition="" x-transition.duration.300="" class="panel my-8 w-[90%] max-w-lg overflow-hidden rounded-lg border-0 p-0 md:w-full">
                                            <button type="button" class="absolute top-4 text-white-dark hover:text-dark ltr:right-4 rtl:left-4" @click="addContactModal = false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </button>
                                            <h3 class="bg-[#fbfbfb] py-3 text-lg font-medium ltr:pl-5 ltr:pr-[50px] rtl:pr-5 rtl:pl-[50px] dark:bg-[#121c2c]" x-text="params.id ? 'Edit Product' : 'Add Product'"></h3>
                                            <div class="p-5">
                                                <form @submit.prevent="saveUser">
                                                    <div class="mb-5">
                                                        <label for="productImage">Product Image</label>
                                                        <input id="path" type="file" class="form-input" x-model="params.path">
                                                        <div class="mt-3">
                                                            <img class="mx-auto max-h-40 w-4/5 object-contain" :src="params.path || 'assetsD/images/default.png'" alt="Product Image">
                                                        </div>
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="name">Product Name</label>
                                                        <input id="name" type="text" placeholder="Enter Name" class="form-input" x-model="params.name">
                                                    </div>
                                                    <div class="mb-5">
                                                        <label for="description">Description</label>
                                                        <textarea id="description" placeholder="Enter Description" class="form-input" x-model="params.email"></textarea>
                                                    </div>
                                                    <!-- <div class="mb-5">
                                                        <label for="number">Phone Number</label>
                                                        <input id="number" type="text" placeholder="Enter Phone Number" class="form-input" x-model="params.phone">
                                                    </div> -->
                                                    <div class="mb-5">
                                                        <label for="role">Product Category</label>
                                                        <select id="role" class="form-input" x-model="params.role">
                                                            <option value="" disabled>Select Category</option>
                                                            <?php foreach($cats as $cat):?>
                                                                <option value="<?=htmlspecialchars($cat['categoryID'])?>" ><?=htmlspecialchars($cat['name'])?></option>
                                                             <?php endforeach; ?>       
                                                        </select>
                                                    </div>    
                                                    <!-- <div class="mb-5">
                                                        <label for="number">Location</label>
                                                        <input id="location" type="text" placeholder="Enter Location eg.(City, Province)" class="form-input" x-model="params.location">
                                                    </div>
                                                    -->
                                                    <div class="mt-8 flex items-center justify-end">
                                                        <button type="button" class="btn btn-outline-danger" @click="addContactModal = false">
                                                            Cancel
                                                        </button>
                                                        <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4" x-text="params.id ? 'Update' : 'Add'"></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-primary p-2" :class="{ 'bg-primary text-white': displayType === 'list' }" @click="setDisplayType('list')">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path opacity="0.5" d="M2 12.5L3.21429 14L7.5 10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                        <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-outline-primary p-2" :class="{ 'bg-primary text-white': displayType === 'grid' }" @click="setDisplayType('grid')">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                        <path opacity="0.5" d="M2.5 6.5C2.5 4.61438 2.5 3.67157 3.08579 3.08579C3.67157 2.5 4.61438 2.5 6.5 2.5C8.38562 2.5 9.32843 2.5 9.91421 3.08579C10.5 3.67157 10.5 4.61438 10.5 6.5C10.5 8.38562 10.5 9.32843 9.91421 9.91421C9.32843 10.5 8.38562 10.5 6.5 10.5C4.61438 10.5 3.67157 10.5 3.08579 9.91421C2.5 9.32843 2.5 8.38562 2.5 6.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M13.5 17.5C13.5 15.6144 13.5 14.6716 14.0858 14.0858C14.6716 13.5 15.6144 13.5 17.5 13.5C19.3856 13.5 20.3284 13.5 20.9142 14.0858C21.5 14.6716 21.5 15.6144 21.5 17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M2.5 17.5C2.5 15.6144 2.5 14.6716 3.08579 14.0858C3.67157 13.5 4.61438 13.5 6.5 13.5C8.38562 13.5 9.32843 13.5 9.91421 14.0858C10.5 14.6716 10.5 15.6144 10.5 17.5C10.5 19.3856 10.5 20.3284 9.91421 20.9142C9.32843 21.5 8.38562 21.5 6.5 21.5C4.61438 21.5 3.67157 21.5 3.08579 20.9142C2.5 20.3284 2.5 19.3856 2.5 17.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M13.5 6.5C13.5 4.61438 13.5 3.67157 14.0858 3.08579C14.6716 2.5 15.6144 2.5 17.5 2.5C19.3856 2.5 20.3284 2.5 20.9142 3.08579C21.5 3.67157 21.5 4.61438 21.5 6.5C21.5 8.38562 21.5 9.32843 20.9142 9.91421C20.3284 10.5 19.3856 10.5 17.5 10.5C15.6144 10.5 14.6716 10.5 14.0858 9.91421C13.5 9.32843 13.5 8.38562 13.5 6.5Z" stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="relative">
                            <input type="text" placeholder="Search" class="peer form-input py-2 ltr:pr-11 rtl:pl-11" x-model="searchUser" @keyup="searchContacts">
                            <div class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-[11px] rtl:left-[11px]">
                                <svg class="mx-auto" width="16" height="16" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                                    <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel mt-5 overflow-hidden border-0 p-0">
                    <template x-if="displayType === 'list'">
                        <div class="table-responsive">
                            <table class="table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <!-- <th>Location</th>
                                        <th>Phone</th> -->
                                        <th class="!text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template x-for="contact in filterdContactsList" :key="contact.id">
                                        <tr>
                                            <td>
                                                <div class="flex w-max items-center">
                                                    <div class="flex-none mr-3">
                                                        <div class="p-1 bg-white-dark/30 rounded-full"><img class="h-8 w-8 rounded-full object-cover" :src="contact.path" /></div>
                                                    </div>
                                                    <div x-show="!contact.path && contact.name" class="grid h-8 w-8 place-content-center rounded-full bg-primary text-sm font-semibold text-white ltr:mr-2 rtl:ml-2" x-text="contact.name.charAt(0) + '' + contact.name.charAt(contact.name.indexOf(' ') + 1)"></div>
                                                    <div x-show="!contact.path && !contact.name" class="rounded-full border border-gray-300 p-2 ltr:mr-2 rtl:ml-2 dark:border-gray-800">
                                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-4.5 w-4.5">
                                                            <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                                            <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                                        </svg>
                                                    </div>
                                                    <div x-text="contact.name"></div>
                                                    <div class="text-white-dark" x-text="contact.jobTitle"></div>
                                                    
                                                    
                                                </div>
                                            </td>
                                            <td x-text="contact.email"></td>
                                            <!-- <td x-text="contact.location" class="whitespace-nowrap"></td>
                                            <td x-text="contact.phone" class="whitespace-nowrap"></td> -->
                                            <td>
                                                <div class="flex items-center justify-center gap-4">
                                                    <button type="button" class="btn btn-sm btn-outline-primary" @click="editUser(contact)">
                                                        Edit
                                                    </button>
                                                    <button type="button" name="deleteUser" class="btn btn-sm btn-outline-danger" @click="deleteUser(contact)">
                                                        Delete
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </div>
                <template x-if="displayType === 'grid'">
                    <div class="my-5 grid w-full grid-cols-1 gap-6 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">
                        <template x-for="contact in filterdContactsList" :key="contact.id">
                            <div class="relative overflow-hidden rounded-md bg-white text-center shadow dark:bg-[#1c232f]">
                                <div class="rounded-t-md bg-white/40 bg-[url('../images/notification-bg.png')] bg-cover bg-center p-6 pb-0">
                                    <template x-if="contact.path">
                                        <img class="mx-auto max-h-40 w-4/5 object-contain" :src="contact.path">
                                    </template>
                                </div>
                                <div class="relative -mt-10 px-6 pb-24">
                                    <div class="rounded-md bg-white px-2 py-4 shadow-md dark:bg-gray-900">
                                        <div class="text-xl" x-text="contact.name"></div>
                                        <div class="text-white-dark" x-text="contact.role"></div>
                                       
                                        
                                    </div>
                                    <div class="mt-6 grid grid-cols-1 gap-4 ltr:text-left rtl:text-right">
                                        <div class="flex items-center">
                                            <div class="flex-none ltr:mr-2 rtl:ml-2"></div>
                                            <div class="break-words text-white-dark" x-text="contact.email"></div>
                                        </div>
                                        <!-- <div class="flex items-center">
                                            <div class="flex-none ltr:mr-2 rtl:ml-2">Product Category :</div>
                                            <div class="text-white-dark" x-text="contact.role"></div>
                                        </div> -->
                                        <!-- <div class="flex items-center">
                                            <div class="flex-none ltr:mr-2 rtl:ml-2">Address :</div>
                                            <div class="text-white-dark" x-text="contact.location"></div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="absolute bottom-0 mt-6 flex w-full gap-4 p-6 ltr:left-0 rtl:right-0">
                                    <button type="button" class="btn btn-outline-primary w-1/2" @click="editUser(contact)">Edit</button>
                                    <button type="button" name="deleteUser" class="btn btn-outline-danger w-1/2" @click="deleteUser(contact)">Delete</button>
                                </div>
                            </div>
                        </template>
                    </div>
                </template>
            </div>
            <!-- end main content section -->

        </div>

        <!-- start footer section -->
        <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
            © <span id="footer-year">2022</span>. kyuuush All rights reserved.
          
        </div>
        <!-- end footer section -->
    </div>

    <?= var_dump($cats)?>
</div>

<script>

    const productInfo = <?= json_encode($productInfo)?>;
 
    document.addEventListener('alpine:init', () => {
        // main section
        Alpine.data('scrollToTop', () => ({
            showTopButton: false,
            init() {
                window.onscroll = () => {
                    this.scrollFunction();
                };
            },

            scrollFunction() {
                if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                    this.showTopButton = true;
                } else {
                    this.showTopButton = false;
                }
            },

            goToTop() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            },
        }));

        // theme customization
        Alpine.data('customizer', () => ({
            showCustomizer: false,
        }));

        // sidebar section
        Alpine.data('sidebar', () => ({
            init() {
                const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.click();
                            });
                        }
                    }
                }
            },
        }));

        // header section
        Alpine.data('header', () => ({
            init() {
                const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                if (selector) {
                    selector.classList.add('active');
                    const ul = selector.closest('ul.sub-menu');
                    if (ul) {
                        let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                        if (ele) {
                            ele = ele[0];
                            setTimeout(() => {
                                ele.classList.add('active');
                            });
                        }
                    }
                }
            },

            notifications: [
                {
                    id: 1,
                    profile: 'user-profile.jpeg',
                    message: '<strong class="text-sm mr-1">kyuuush</strong>invite you to <strong>Prototyping</strong>',
                    time: '45 min ago',
                },
                {
                    id: 2,
                    profile: 'profile-34.jpeg',
                    message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                    time: '9h Ago',
                },
                {
                    id: 3,
                    profile: 'profile-16.jpeg',
                    message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                    time: '9h Ago',
                },
            ],

            messages: [
                {
                    id: 1,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                    title: 'Congratulations!',
                    message: 'Your OS has been updated.',
                    time: '1hr',
                },
                {
                    id: 2,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                    title: 'Did you know?',
                    message: 'You can switch between artboards.',
                    time: '2hr',
                },
                {
                    id: 3,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                    title: 'Something went wrong!',
                    message: 'Send Reposrt',
                    time: '2days',
                },
                {
                    id: 4,
                    image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                    title: 'Warning',
                    message: 'Your password strength is low.',
                    time: '5days',
                },
            ],

            languages: [
                {
                    id: 1,
                    key: 'Khmer',
                    value: 'kh',
                },
                {
                    id: 2,
                    key: 'Danish',
                    value: 'da',
                },
                {
                    id: 3,
                    key: 'English',
                    value: 'en',
                },
                {
                    id: 4,
                    key: 'French',
                    value: 'fr',
                },
                {
                    id: 5,
                    key: 'German',
                    value: 'de',
                },
                {
                    id: 6,
                    key: 'Greek',
                    value: 'el',
                },
                {
                    id: 7,
                    key: 'Hungarian',
                    value: 'hu',
                },
                {
                    id: 8,
                    key: 'Italian',
                    value: 'it',
                },
                {
                    id: 9,
                    key: 'Japanese',
                    value: 'ja',
                },
                {
                    id: 10,
                    key: 'Polish',
                    value: 'pl',
                },
                {
                    id: 11,
                    key: 'Portuguese',
                    value: 'pt',
                },
                {
                    id: 12,
                    key: 'Russian',
                    value: 'ru',
                },
                {
                    id: 13,
                    key: 'Spanish',
                    value: 'es',
                },
                {
                    id: 14,
                    key: 'Swedish',
                    value: 'sv',
                },
                {
                    id: 15,
                    key: 'Turkish',
                    value: 'tr',
                },
                {
                    id: 16,
                    key: 'Arabic',
                    value: 'ae',
                },
            ],

            removeNotification(value) {
                this.notifications = this.notifications.filter((d) => d.id !== value);
            },

            removeMessage(value) {
                this.messages = this.messages.filter((d) => d.id !== value);
            },
        }));
        //contacts
        Alpine.data('contacts', () => ({
            defaultParams: {
                id: null,
                name: '',
                email: '',
                role: '',
                phone: '',
                location: '',
            },
            displayType: 'list',
            addContactModal: false,
            params: {
                id: null,
                name: '',
                email: '',
                role: '',
                phone: '',
                location: '',
            },
            filterdContactsList: [],
            searchUser: '',
            contactList:productInfo.map((product) => ({
                id: product.productID,
                path: `data:image/jpeg;base64,${product.image}`,
                name: product.productName,
                role: product.name,
                email: product.description,
                // phone: product.phoneNo,
                // location: `${product.city}, ${product.province}`
            })),

            init() {
                this.searchContacts();
            },

            searchContacts() {
                this.filterdContactsList = this.contactList.filter((d) => d.name.toLowerCase().includes(this.searchUser.toLowerCase()));
            },

            editUser(user) {
                this.params = this.defaultParams;
                if (user) {
                    this.params = JSON.parse(JSON.stringify(user));
                }

                this.addContactModal = true;
            },

            saveUser() {
                if (!this.params.name || !this.params.email || !this.params.path) {
                this.showMessage('All fields are required.', 'error');
                return true;
            }

            const endpoint = this.params.id ? '/API/updateProduct.php' : '/API/addProduct.php';

            fetch(endpoint, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(this.params)
            })
            .then(res => res.json())
            .then(data => {
                if (data.message.includes('added') || data.message.includes('updated')) {
                    if (!this.params.id) {
                        // Add locally
                        const maxId = this.contactList.length ? Math.max(...this.contactList.map(u => u.id)) : 0;
                        const newUser = {
                            ...this.params,
                            id: maxId + 1,
                            path: '../public/assesD/images/user-profile.jpeg'
                        };
                        this.contactList.unshift(newUser);
                    } else {
                        const user = this.contactList.find(d => d.id === this.params.id);
                        Object.assign(user, this.params);
                    }

                    this.searchContacts();
                    this.showMessage(data.message);
                    this.addContactModal = false;
                } else {
                    this.showMessage(data.message, 'error');
                }
            })
            .catch(() => this.showMessage('Server error. Could not save user.', 'error'));
            },

            deleteUser(user) {
        fetch('/API/deleteProduct.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ id: user.id }),
        })
        .then(res => res.json())
        .then(data => {
            if (data.message === 'User deleted') {
                this.contactList = this.contactList.filter((d) => d.id !== user.id);
                this.searchContacts();
                this.showMessage('User has been deleted successfully.');
            } else {
                this.showMessage(data.message, 'error');
            }
        })
        .catch(() => {
            this.showMessage('Server error. Could not delete user.', 'error');
        });
        },

            setDisplayType(type) {
                this.displayType = type;
            },

            showMessage(msg = '', type = 'success') {
                const toast = window.Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 3000,
                });
                toast.fire({
                    icon: type,
                    title: msg,
                    padding: '10px 20px',
                });
            },
        }));
    });
</script>
</body>
</html>
