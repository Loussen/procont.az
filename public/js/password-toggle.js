document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('input[type="password"]').forEach(function (input) {
        // Toggle button yarat
        const wrapper = document.createElement('div');
        wrapper.classList.add('input-group');

        const toggleBtn = document.createElement('button');
        toggleBtn.type = 'button';
        toggleBtn.classList.add('btn', 'btn-outline-secondary');
        toggleBtn.innerHTML = '<i class="la la-eye"></i>';

        // Input-u wrapper-ə qoy
        input.parentNode.insertBefore(wrapper, input);
        wrapper.appendChild(input);
        wrapper.appendChild(toggleBtn);

        // Toggle click event
        toggleBtn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('la-eye');
                icon.classList.add('la-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('la-eye-slash');
                icon.classList.add('la-eye');
            }
        });
    });
});
