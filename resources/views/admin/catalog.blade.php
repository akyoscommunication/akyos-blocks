@extends('akyos-blocks::layouts.admin')

@section('content')
<div class="wrap">
    <h1 class="wp-heading-inline">Catalogue de blocs</h1>
    
    <div class="akyos-blocks-catalog">
        <div class="catalog-content">
            <div class="catalog-stats">
                <div class="stat-card">
                    <h3>Blocs disponibles</h3>
                    <div class="stat-number">{{ count($blocks ?? []) }}</div>
                </div>
                <div class="stat-card">
                    <h3>Catégories</h3>
                    <div class="stat-number">{{ count($categories ?? []) }}</div>
                </div>
                <div class="stat-card">
                    <h3>Dans la sélection</h3>
                    <div class="stat-number cart-count">0</div>
                </div>
            </div>
            
            <div class="catalog-blocks">

            <div class="catalog-blocks-header">
                <h2>Liste des blocs</h2>

                <div class="catalog-blocks-header-buttons">
                    <button class="add-to-theme-btn" id="add-to-theme-btn">
                        <i data-lucide="plus" class="btn-icon"></i>
                        Ajouter au thème
                    </button>
                    <button class="export-json-btn" id="export-json-btn">
                        <i data-lucide="download" class="btn-icon"></i>
                        Exporter en .json
                    </button>
                </div>
            </div>
                
                @if(isset($categories) && count($categories) > 0)
                    <div class="category-tabs">
                        <button class="tab-button active" data-category="all">
                            <i data-lucide="list" class="tab-icon"></i>
                            Tous les blocs
                            <span class="tab-count">{{ count($blocks ?? []) }}</span>
                        </button>
                        @foreach($categories as $category)
                            @php
                                $categoryBlocks = collect($blocks ?? [])->filter(function($block) use ($category) {
                                    return ($block['category'] ?? '') === $category;
                                });
                                $blockCount = $categoryBlocks->count();
                            @endphp
                            @if($blockCount > 0)
                                <button class="tab-button" data-category="{{ $category }}">
                                    {{ $category }}
                                    <span class="tab-count">{{ $blockCount }}</span>
                                </button>
                            @endif
                        @endforeach
                    </div>
                @endif
                
                @if(isset($blocks) && count($blocks) > 0)
                    <div class="blocks-grid" id="blocks-container">
                        @foreach($blocks as $index => $block)
                            <div class="block-card" data-category="{{ $block['category'] ?? 'Non catégorisé' }}" data-block-id="{{ $block['id'] ?? 'block_' . $index . '_' . uniqid() }}">
                                <div class="block-preview" id="block-preview-{{ $block['id'] ?? 'block_' . $index . '_' . uniqid() }}">
                                    @if(isset($block['preview']))
                                        <img src="{{ $block['preview'] }}" alt="Aperçu du bloc {{ $block['name'] }}">
                                    @else
                                        <div class="no-preview">
                                            <i data-lucide="image" class="no-preview-icon"></i>
                                            Aucun aperçu
                                        </div>
                                    @endif
                                </div>
                                <div class="block-info">
                                    <div class="block-meta">
                                        <h3>{{ $block['name'] ?? 'Nom inconnu' }}</h3>
                                        <span class="block-category">{{ $block['category'] ?? 'Non catégorisé' }}</span>
                                    </div>
                                    <div class="block-actions">
                                        <button class="add-to-cart-btn" data-block='@json($block)' data-block-id="{{ $block['id'] ?? 'block_' . $index . '_' . uniqid() }}">
                                            <i data-lucide="plus" class="btn-icon"></i>
                                            Ajouter à la sélection
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-blocks">
                        <i data-lucide="package-x" class="no-blocks-icon"></i>
                        <p>Aucun bloc disponible pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Icône flottante de sélection -->
<div class="floating-selection-icon" id="floating-selection-icon">
    <div class="selection-icon">
        <i data-lucide="clipboard-list" class="icon"></i>
        <span class="selection-count" id="selection-count">0</span>
    </div>
</div>

<!-- Modal de la sélection -->
<div class="cart-modal" id="cart-modal">
    <div class="modal-overlay" id="modal-overlay"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h2><i data-lucide="clipboard-list" class="modal-header-icon"></i> Récapitulatif de la sélection</h2>
            <button class="close-modal" id="close-modal">
                <i data-lucide="x"></i>
            </button>
        </div>
        <div class="modal-body">
            <div class="cart-summary" id="cart-summary">
                <!-- Contenu de la sélection sera injecté ici -->
            </div>
        </div>
        <div class="modal-footer">
            <button class="add-to-theme-btn" id="add-to-theme-btn">
                <i data-lucide="plus" class="btn-icon"></i>
                Ajouter au thème
            </button>
            <button class="export-json-btn" id="export-json-btn">
                <i data-lucide="download" class="btn-icon"></i>
                Exporter en .json
            </button>
            <button class="clear-cart-btn" id="clear-cart-btn">
                <i data-lucide="trash-2" class="btn-icon"></i>
                Vider la sélection
            </button>
        </div>
    </div>
</div>

<!-- Lightbox pour les images -->
<div class="lightbox-modal" id="lightbox-modal">
    <div class="lightbox-overlay" id="lightbox-overlay"></div>
    <div class="lightbox-content">
        <button class="lightbox-close" id="lightbox-close">
            <i data-lucide="x"></i>
        </button>
        <div class="lightbox-image-container">
            <img id="lightbox-image" src="" alt="">
        </div>
        <div class="lightbox-caption" id="lightbox-caption"></div>
    </div>
</div>

<!-- CDN Lucide Icons -->
<script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

<script>
// Variables globales pour AJAX
const ajaxUrl = '{{ admin_url("admin-ajax.php") }}';
const nonce = '{{ $nonce }}';
document.addEventListener('DOMContentLoaded', function() {
    // Initialiser les icônes Lucide
    lucide.createIcons();
    
    // Initialisation de la sélection
    let cart = JSON.parse(localStorage.getItem('akyos-blocks-cart')) || [];
    
    // Éléments DOM
    const cartCount = document.querySelector('.cart-count');
    const selectionCount = document.getElementById('selection-count');
    const floatingSelectionIcon = document.getElementById('floating-selection-icon');
    const cartModal = document.getElementById('cart-modal');
    const modalOverlay = document.getElementById('modal-overlay');
    const closeModal = document.getElementById('close-modal');
    const exportJsonBtn = document.getElementById('export-json-btn');
    const clearCartBtn = document.getElementById('clear-cart-btn');
    
    // Éléments DOM pour la lightbox
    const lightboxModal = document.getElementById('lightbox-modal');
    const lightboxOverlay = document.getElementById('lightbox-overlay');
    const lightboxClose = document.getElementById('lightbox-close');
    const lightboxImage = document.getElementById('lightbox-image');
    const lightboxCaption = document.getElementById('lightbox-caption');

    // Mise à jour de l'affichage de la sélection
    function updateCartDisplay() {
        const count = cart.length;
        cartCount.textContent = count;
        selectionCount.textContent = count;
        
        // Afficher/masquer l'icône flottante
        if (count > 0) {
            floatingSelectionIcon.style.display = 'block';
        } else {
            floatingSelectionIcon.style.display = 'none';
        }
        
        // Mettre à jour l'état des boutons
        updateButtonStates();
    }
    
    // Mettre à jour l'état des boutons
    function updateButtonStates() {
        const allButtons = document.querySelectorAll('.add-to-cart-btn');
        
        allButtons.forEach(button => {
            const blockData = JSON.parse(button.dataset.block);
            
            // Vérifier si ce bloc est dans la sélection
            const isInSelection = cart.find(item => {
                if (item.id && blockData.id) {
                    return item.id === blockData.id;
                }
                return item.name === blockData.name && item.category === blockData.category;
            });
            
            if (isInSelection) {
                button.innerHTML = '<i data-lucide="check" class="btn-icon"></i> Sélectionné';
                button.disabled = true;
                button.classList.add('selected');
                // Recréer les icônes pour le nouveau contenu
                lucide.createIcons();
            } else {
                button.innerHTML = '<i data-lucide="plus" class="btn-icon"></i> Ajouter à la sélection';
                button.disabled = false;
                button.classList.remove('selected');
                // Recréer les icônes pour le nouveau contenu
                lucide.createIcons();
            }
        });
    }
    
    // Rendu du récapitulatif de la sélection
    function renderCartSummary() {
        const cartSummary = document.getElementById('cart-summary');
        if (cart.length === 0) {
            cartSummary.innerHTML = '<div class="empty-cart-summary"><i data-lucide="inbox" class="empty-icon"></i><p>Votre sélection est vide</p></div>';
            lucide.createIcons();
            return;
        }
        
        let summaryHTML = `
            <table class="cart-items-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Catégorie</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
        `;
        cart.forEach((item, index) => {
            summaryHTML += `
                <tr class="summary-item">
                    <td class="item-name">${item.name}</td>
                    <td class="item-category">${item.category}</td>
                    <td>
                        <button class="remove-from-summary" data-index="${index}">
                            <i data-lucide="x" class="btn-icon"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
        summaryHTML += `
                </tbody>
            </table>
        `;
        
        cartSummary.innerHTML = summaryHTML;
        lucide.createIcons();
    }
    
    // Ajouter à la sélection
    function addToCart(block) {
        // Vérifier si le bloc a un ID unique, sinon en créer un
        if (!block.id) {
            block.id = 'block_' + Date.now() + '_' + Math.random().toString(36).substr(2, 9);
        }
        
        // Vérifier si le bloc est déjà dans la sélection
        const existingBlock = cart.find(item => {
            // Comparer par ID si disponible, sinon par nom et catégorie
            if (item.id && block.id) {
                return item.id === block.id;
            }
            return item.name === block.name && item.category === block.category;
        });
        
        if (!existingBlock) {
            cart.push(block);
            localStorage.setItem('akyos-blocks-cart', JSON.stringify(cart));
            updateCartDisplay();
            
            // Désactiver le bouton et afficher "Sélectionné"
            const addBtn = document.querySelector(`[data-block-id="${block.id}"] .add-to-cart-btn`);
            if (addBtn) {
                addBtn.innerHTML = '<i data-lucide="check" class="btn-icon"></i> Sélectionné';
                addBtn.disabled = true;
                addBtn.classList.add('selected');
                lucide.createIcons();
            }
        }
    }
    
    // Retirer de la sélection
    function removeFromCart(index) {
        cart.splice(index, 1);
        localStorage.setItem('akyos-blocks-cart', JSON.stringify(cart));
        updateCartDisplay();
        if (cartModal.classList.contains('active')) {
            renderCartSummary();
        }
    }
    
    // Ajouter les blocs sélectionnés au thème
    function addBlocksToTheme() {
        if (cart.length === 0) {
            alert('Veuillez d\'abord sélectionner des blocs à ajouter au thème.');
            return;
        }
        
        // Afficher un indicateur de chargement
        const addToThemeBtns = document.querySelectorAll('.add-to-theme-btn');
        addToThemeBtns.forEach(btn => {
            btn.disabled = true;
            btn.innerHTML = '<i data-lucide="loader-2" class="btn-icon"></i> Ajout en cours...';
            lucide.createIcons();
        });
        
        // Préparer les données
        const formData = new FormData();

        const array = [];
        cart.forEach(item => {
            array.push(item.name);
        });

        formData.append('action', 'akyos_add_blocks_to_theme');
        formData.append('nonce', nonce);
        formData.append('blocks', array);
        
        // Envoyer la requête AJAX
        fetch(ajaxUrl, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Succès
                alert(data.data.message);
                
                // Vider la sélection après ajout réussi
                cart = [];
                localStorage.removeItem('akyos-blocks-cart');
                updateCartDisplay();
                renderCartSummary();
                
                // Fermer le modal s'il est ouvert
                if (cartModal.classList.contains('active')) {
                    cartModal.classList.remove('active');
                    document.body.classList.remove('modal-open');
                }
            } else {
                // Erreur
                alert('Erreur: ' + (data.data || 'Une erreur est survenue'));
            }
        })
        .catch(error => {
            console.error('Erreur AJAX:', error);
        })
        .finally(() => {
            // Restaurer les boutons
            addToThemeBtns.forEach(btn => {
                btn.disabled = false;
                btn.innerHTML = '<i data-lucide="plus" class="btn-icon"></i> Ajouter au thème';
                lucide.createIcons();
            });
        });
    }
    
    // Fonctions pour la lightbox
    function openLightbox(imageSrc, imageAlt) {
        lightboxImage.src = imageSrc;
        lightboxImage.alt = imageAlt;
        lightboxCaption.textContent = imageAlt;
        lightboxModal.classList.add('active');
        document.body.classList.add('lightbox-open');
        
        // Empêcher le défilement de la page
        document.body.style.overflow = 'hidden';
    }
    
    function closeLightbox() {
        lightboxModal.classList.remove('active');
        document.body.classList.remove('lightbox-open');
        
        // Restaurer le défilement de la page
        document.body.style.overflow = '';
        
        // Vider l'image après l'animation
        setTimeout(() => {
            lightboxImage.src = '';
            lightboxImage.alt = '';
            lightboxCaption.textContent = '';
        }, 300);
    }
    
    // Événements
    document.addEventListener('click', function(e) {


        // Ouvrir la lightbox au clic sur une preview de bloc
        if (e.target.closest('.block-preview')) {
            const preview = e.target.closest('.block-preview');
            const img = preview.querySelector('img');
            
            // Vérifier qu'il y a bien une image (pas de preview vide)
            if (img && img.src) {
                const imageSrc = img.src;
                const imageAlt = img.alt;
                openLightbox(imageSrc, imageAlt);
                return;
            }
        }
        
        // Fermer la lightbox
        if (e.target.closest('#lightbox-close') || e.target.closest('#lightbox-overlay')) {
            closeLightbox();
            return;
        }
        
        // Ajouter à la sélection
        if (e.target.closest('.add-to-cart-btn')) {
            const btn = e.target.closest('.add-to-cart-btn');
            const blockData = JSON.parse(btn.dataset.block);
            addToCart(blockData);
        }
        
        // Retirer de la sélection (modal)
        if (e.target.closest('.remove-from-summary')) {
            const btn = e.target.closest('.remove-from-summary');
            const index = parseInt(btn.dataset.index);
            removeFromCart(index);
        }
        
        // Ouvrir le modal
        if (e.target.closest('#floating-selection-icon')) {
            renderCartSummary();
            cartModal.classList.add('active');
            document.body.classList.add('modal-open');
        }
        
        // Fermer le modal
        if (e.target.closest('#close-modal') || e.target.closest('#modal-overlay')) {
            cartModal.classList.remove('active');
            document.body.classList.remove('modal-open');
        }
        
        // Vider la sélection
        if (e.target.closest('#clear-cart-btn')) {
            if (confirm('Êtes-vous sûr de vouloir vider la sélection ?')) {
                cart = [];
                localStorage.removeItem('akyos-blocks-cart');
                updateCartDisplay();
                renderCartSummary();
            }
        }
        
        // Ajouter au thème
        if (e.target.closest('.add-to-theme-btn')) {
            addBlocksToTheme();
        }
        
        // Exporter en JSON
        if (e.target.closest('#export-json-btn') || e.target.closest('#export-json-btn-catalog')) {
            if (cart.length > 0) {

                const array = [];

                cart.forEach(item => {
                    array.push(item.name);
                });

                const dataStr = JSON.stringify(array, null, 2);

                const dataBlob = new Blob([dataStr], {type: 'application/json'});
                const url = URL.createObjectURL(dataBlob);
                const link = document.createElement('a');
                link.href = url;
                link.download = 'akyos-blocks.json';
                link.click();
                URL.revokeObjectURL(url);
            }
        }
    });
    
    // Système de tabs (code existant)
    const tabButtons = document.querySelectorAll('.tab-button');
    const blockCards = document.querySelectorAll('.block-card');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const selectedCategory = this.getAttribute('data-category');
            
            tabButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            blockCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                
                if (selectedCategory === 'all' || cardCategory === selectedCategory) {
                    card.style.display = 'block';
                    card.style.animation = 'fadeIn 0.3s ease-in-out';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    });
    
    // Gestion des touches clavier
    document.addEventListener('keydown', function(e) {
        // Fermer la lightbox avec la touche Échap
        if (e.key === 'Escape' && lightboxModal.classList.contains('active')) {
            closeLightbox();
        }
    });
    
    // Ajouter les event listeners pour les previews
    function addPreviewListeners() {
        const previews = document.querySelectorAll('.block-preview');
        previews.forEach(preview => {
            preview.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();
                
                const img = this.querySelector('img');
                if (img && img.src) {
                    const imageSrc = img.src;
                    const imageAlt = img.alt;
                    openLightbox(imageSrc, imageAlt);
                }
            });
        });
    }
    
    // Initialisation
    updateCartDisplay();
    addPreviewListeners();
});
</script>
@endsection

