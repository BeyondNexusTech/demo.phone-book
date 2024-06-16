/*
 * Copyright (c) 2024. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

import { ToastGenerator } from "./class/ToastGenerator.min.js";
import { CalloutGenerator } from "./class/CalloutGenerator.min.js";
import { DataFormatter } from "./class/DataFormatter.min.js";

document.addEventListener('DOMContentLoaded', async function (){
    $.ajaxSetup({ cache: false });
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
        })
    })();

    const toastGenerator = new ToastGenerator();
    const calloutGenerator = new CalloutGenerator();
    const dataFormatter = new DataFormatter();

    const url = window.location;
    const pathname = url.pathname;

    if (pathname === '/') {
        const { homeIndexPage } = await import('./page/home/index.min.js');
        homeIndexPage();
    } else if (pathname === '/home/search') {
        const { homeSearchPage } = await import('./page/home/search.min.js');
        homeSearchPage();
    } else if (pathname === '/phonebook/index') {
        const { phonebookIndexPage } = await import('./page/phonebook/index.min.js');
        phonebookIndexPage();
    } else if (pathname === '/phonebook/add') {
        const { phonebookAddPage } = await import('./page/phonebook/add.min.js');
        phonebookAddPage()
    } else if (pathname === '/phonebook/edit') {
        const { phonebookEditPage } = await import('./page/phonebook/edit.min.js');
        phonebookEditPage()
    }
});