import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Script para fazer as linhas clicáveis
document.addEventListener('DOMContentLoaded', function () {
    var rows = document.querySelectorAll('.clickable-row');
    rows.forEach(function(row) {
        row.addEventListener('click', function() {
            window.open(row.dataset.href, '_blank', 'width=800,height=600');
        });
    });
    });
    
