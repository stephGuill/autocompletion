// JS pour l'autocomplétion de la barre de recherche
function setupAutocomplete(inputId, suggestionsId) {
    const input = document.getElementById(inputId);
    const suggestions = document.getElementById(suggestionsId);
    let lastQuery = '';
    input.addEventListener('input', function() {
        const query = input.value.trim();
        if (query.length === 0) {
            suggestions.innerHTML = '';
            suggestions.style.display = 'none';
            return;
        }
        lastQuery = query;
        fetch('suggestions.php?query=' + encodeURIComponent(query))
            .then(r => r.json())
            .then(data => {
                if (input.value.trim() !== lastQuery) return;
                let html = '';
                if (data.start.length > 0) {
                    data.start.forEach(item => {
                        html += `<li><a href="element.php?id=${item.id}">${item.nom}</a></li>`;
                    });
                }
                if (data.start.length > 0 && data.contains.length > 0) {
                    html += '<li class="separator">Autres résultats</li>';
                }
                if (data.contains.length > 0) {
                    data.contains.forEach(item => {
                        html += `<li><a href="element.php?id=${item.id}">${item.nom}</a></li>`;
                    });
                }
                suggestions.innerHTML = html;
                suggestions.style.display = html ? 'block' : 'none';
            });
    });
    // Cacher suggestions si clic ailleurs
    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !suggestions.contains(e.target)) {
            suggestions.style.display = 'none';
        }
    });
    // Afficher suggestions si focus
    input.addEventListener('focus', function() {
        if (suggestions.innerHTML) suggestions.style.display = 'block';
    });
}

// Pour la barre du header
if (document.getElementById('header-search')) {
    setupAutocomplete('header-search', 'header-suggestions');
}
// Pour la barre de l'accueil
if (document.getElementById('search')) {
    setupAutocomplete('search', 'suggestions');
}
