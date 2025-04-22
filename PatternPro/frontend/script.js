document.addEventListener('DOMContentLoaded', function() {

    const searchInput = document.getElementById('pattern-search');
    const searchError = document.getElementById('search-error');
    const bullishBtn = document.getElementById('bullish-btn');
    const bearishBtn = document.getElementById('bearish-btn');
    const allBtn = document.getElementById('all-btn');
    const patternsContainer = document.getElementById('patterns-container');
    const patternCards = document.querySelectorAll('.pattern-card');
    const descriptionPreviews = document.querySelectorAll('.pattern-description-preview');
    
    const patterns = Array.from(patternCards).map(card => ({
        element: card,
        name: card.querySelector('.pattern-name').textContent.toLowerCase(),
        type: card.classList.contains('bullish') ? 'bullish' : 'bearish'
    }));
    
    searchInput.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        searchError.style.display = 'none';
        
        if (searchTerm === '') {
            updateDisplay();
            return;
        }
        
        const filteredPatterns = patterns.filter(pattern => 
            pattern.name.includes(searchTerm)
        );

        if (filteredPatterns.length === 0) {
            searchError.textContent = 'Nie znaleziono formacji o podanej nazwie';
            searchError.style.display = 'block';
        }
        
        patterns.forEach(pattern => {
            if (filteredPatterns.includes(pattern)) {
                pattern.element.style.display = 'block';
            } else {
                pattern.element.style.display = 'none';
            }
        });
    });
    
    function updateDisplay() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        const activeFilter = document.querySelector('.filter-btn.active').id;
        
        patterns.forEach(pattern => {
            let showPattern = true;
            
            if (activeFilter === 'bullish-btn' && pattern.type !== 'bullish') {
                showPattern = false;
            } else if (activeFilter === 'bearish-btn' && pattern.type !== 'bearish') {
                showPattern = false;
            }
            
            if (searchTerm && !pattern.name.includes(searchTerm)) {
                showPattern = false;
            }
            
            pattern.element.style.display = showPattern ? 'block' : 'none';
        });
        
        const visiblePatterns = patterns.filter(p => 
            p.element.style.display !== 'none'
        );
        
        if (visiblePatterns.length === 0) {
            searchError.textContent = 'Brak formacji spełniających kryteria';
            searchError.style.display = 'block';
        } else {
            searchError.style.display = 'none';
        }
    }
    
    [bullishBtn, bearishBtn, allBtn].forEach(btn => {
        btn.addEventListener('click', function() {
            document.querySelector('.filter-btn.active').classList.remove('active');
            this.classList.add('active');
            
            updateDisplay();
        });
    });
    
    descriptionPreviews.forEach(preview => {
        preview.addEventListener('click', function() {
            const card = this.closest('.pattern-card');
            const fullDesc = card.querySelector('.pattern-description-full');
            
            if (fullDesc.style.display === 'block') {
                fullDesc.style.display = 'none';
            } else {
                document.querySelectorAll('.pattern-description-full').forEach(desc => {
                    desc.style.display = 'none';
                });
                
                fullDesc.style.display = 'block';
            }
        });
    });
});
