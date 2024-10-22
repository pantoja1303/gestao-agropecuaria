import './bootstrap';

// Script para fazer as linhas clicáveis
document.addEventListener('DOMContentLoaded', function () {
var rows = document.querySelectorAll('.clickable-row');
rows.forEach(function(row) {
    row.addEventListener('click', function() {
        window.location = this.dataset.href;
    });
});
});
