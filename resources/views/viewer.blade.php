@extends('layouts.app')

@section('title', $title . ' | GRUPO INDI')

@section('content')
<!-- PDF.js and PageFlip Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/page-flip@2.0.7/dist/js/page-flip.browser.min.js"></script>

<div class="brochure-viewer-page">
    <!-- Interactive Flipbook Container -->
    <div class="flipbook-wrapper" id="zoomContainer">
        <div class="flipbook-loading" id="bookLoading">
            <div class="loading-spinner"></div>
            <p>GENERΛNDO ENTORNOL INTERΛCTIVO...</p>
        </div>
        
        <div id="flipbook" class="flipbook-canvas">
            <!-- Pages will be rendered here dynamically -->
        </div>
    </div>

    <!-- Controls -->
    <div class="viewer-controls">
        <div class="zoom-controls">
            <button id="zoomOut" class="control-btn mini">-</button>
            <span class="zoom-level">ZOOM</span>
            <button id="zoomIn" class="control-btn mini">+</button>
        </div>
        
        <div class="nav-controls">
            <button id="prevBtn" class="control-btn">← ΛNTERIOR</button>
            <span class="page-indicator" id="pageIndicator">0 / 0</span>
            <button id="nextBtn" class="control-btn">SIGUIENTΞ →</button>
        </div>

        <a href="{{ $pdf }}" download class="download-btn">DΞSCΛRGΛR PDF</a>
    </div>
</div>

<style>
    .brochure-viewer-page {
        background: #000;
        color: #fff;
        min-height: 100vh;
        padding-top: 140px; /* Space for the header menu */
        display: flex;
        flex-direction: column;
        align-items: center;
        overflow: hidden;
        position: relative;
    }

    /* Flipbook Styling */
    .flipbook-wrapper {
        width: 100%;
        max-width: 1400px;
        height: 80vh; /* Increased height */
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
        perspective: 2000px;
        position: relative;
        cursor: grab;
        transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        transform-origin: center center;
    }

    .flipbook-wrapper:active {
        cursor: grabbing;
    }

    .flipbook-canvas {
        box-shadow: 0 50px 100px rgba(0,0,0,0.5);
        visibility: hidden;
    }

    .page-wrapper {
        background-color: #f0f0f0;
        box-shadow: inset 0 0 50px rgba(0,0,0,0.1);
    }

    .page-content {
        width: 100%;
        height: 100%;
        background-color: #fff;
    }

    .page-content canvas {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* Controls */
    .viewer-controls {
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 90%;
        margin-top: auto;
        padding-bottom: 3vh;
        z-index: 5000; /* High z-index to stay above flipbook animations */
    }

    .zoom-controls, .nav-controls {
        display: flex;
        align-items: center;
        gap: 1.5rem;
    }

    .control-btn, .download-btn {
        background: rgba(255,255,255,0.05);
        border: 1px solid rgba(255,255,255,0.15);
        color: white;
        padding: 0.8rem 1.5rem;
        font-family: 'usual', sans-serif;
        font-size: 0.65rem;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.3s ease;
        text-decoration: none;
        letter-spacing: 0.15em;
    }

    .control-btn.mini {
        padding: 0.5rem 1rem;
        font-size: 0.8rem;
    }

    .control-btn:hover, .download-btn:hover {
        background: #0066f9;
        color: white;
        border-color: #0066f9;
    }

    .page-indicator, .zoom-level {
        font-family: 'usual', sans-serif;
        font-size: 0.65rem;
        letter-spacing: 0.1em;
        opacity: 0.7;
    }

    @media (max-width: 1024px) {
        .flipbook-wrapper {
            height: 70vh;
        }
        .viewer-controls {
            flex-direction: column;
            gap: 2rem;
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', async function() {
        const pdfPath = "{{ $pdf }}";
        const pdfjsLib = window['pdfjs-dist/build/pdf'];
        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/3.11.174/pdf.worker.min.js';

        const flipbookEl = document.getElementById('flipbook');
        const loadingEl = document.getElementById('bookLoading');
        const indicatorEl = document.getElementById('pageIndicator');
        
        try {
            const pdf = await pdfjsLib.getDocument(pdfPath).promise;
            const totalPages = pdf.numPages;
            indicatorEl.innerText = `CΛRGΛNDO 1 / ${totalPages}`;

            // Create Canvas for each page
            for (let i = 1; i <= totalPages; i++) {
                const page = await pdf.getPage(i);
                const originalViewport = page.getViewport({ scale: 1.5 }); // Balanced scale for splitting
                
                // Function to create a page div
                const createPageDiv = (canvas) => {
                    const pageDiv = document.createElement('div');
                    pageDiv.className = 'page-wrapper';
                    const contentDiv = document.createElement('div');
                    contentDiv.className = 'page-content';
                    contentDiv.appendChild(canvas);
                    pageDiv.appendChild(contentDiv);
                    flipbookEl.appendChild(pageDiv);
                    return pageDiv;
                };

                // Logic to handle Spreads (Landscape pages that should be 2 Logical pages)
                if (originalViewport.width > originalViewport.height * 1.2) {
                    // Split the page into two canvases
                    const halfWidth = originalViewport.width / 2;
                    
                    // Left Page
                    const canvasL = document.createElement('canvas');
                    canvasL.width = halfWidth;
                    canvasL.height = originalViewport.height;
                    const ctxL = canvasL.getContext('2d');
                    await page.render({
                        canvasContext: ctxL,
                        viewport: originalViewport,
                        transform: [1, 0, 0, 1, 0, 0] // No transform needed for left
                    }).promise;
                    createPageDiv(canvasL);

                    // Right Page
                    const canvasR = document.createElement('canvas');
                    canvasR.width = halfWidth;
                    canvasR.height = originalViewport.height;
                    const ctxR = canvasR.getContext('2d');
                    await page.render({
                        canvasContext: ctxR,
                        viewport: originalViewport,
                        transform: [1, 0, 0, 1, -halfWidth, 0] // Shift left to show right half
                    }).promise;
                    createPageDiv(canvasR);
                } else {
                    // Portrait: Normal single page
                    const canvas = document.createElement('canvas');
                    canvas.width = originalViewport.width;
                    canvas.height = originalViewport.height;
                    const ctx = canvas.getContext('2d');
                    await page.render({
                        canvasContext: ctx,
                        viewport: originalViewport
                    }).promise;
                    createPageDiv(canvas);
                }
                
                indicatorEl.innerText = `PROCESΛNDO ${i} / ${totalPages}`;
            }

            const totalLogicalPages = document.querySelectorAll('.page-wrapper').length;
            const firstCanvas = document.querySelector('.page-content canvas');
            const pageWidth = firstCanvas.width;
            const pageHeight = firstCanvas.height;
            const aspectRatio = pageWidth / pageHeight;

            // Hide loading, show book
            loadingEl.style.display = 'none';
            flipbookEl.style.visibility = 'visible';

            // Initialize PageFlip with calculated dimensions
            const pageFlip = new St.PageFlip(flipbookEl, {
                width: 600, // base logical width
                height: 600 / aspectRatio, // base logical height based on PDF ratio
                size: "stretch",
                minWidth: 315,
                maxWidth: 1200,
                minHeight: 420,
                maxHeight: 1600,
                maxShadowOpacity: 0.5,
                showCover: true,
                mobileScrollSupport: false
            });

            pageFlip.loadFromHTML(document.querySelectorAll('.page-wrapper'));

            // Zoom and Drag Logic
            let zoom = 1;
            const zoomContainer = document.getElementById('zoomContainer');
            const flipbookDiv = document.getElementById('flipbook');
            
            function updateZoom() {
                zoomContainer.style.transform = `scale(${zoom})`;
                if (zoom > 1) {
                    zoomContainer.style.transform += ` translate(${offsetX}px, ${offsetY}px)`;
                }
            }

            document.getElementById('zoomIn').addEventListener('click', () => {
                zoom = Math.min(zoom + 0.2, 3);
                updateZoom();
            });

            document.getElementById('zoomOut').addEventListener('click', () => {
                zoom = Math.max(zoom - 0.2, 0.5);
                if (zoom === 1) { offsetX = 0; offsetY = 0; }
                updateZoom();
            });

            // Pan Drag Logic
            let isDragging = false;
            let startX, startY;
            let offsetX = 0, offsetY = 0;

            zoomContainer.addEventListener('mousedown', (e) => {
                if (zoom <= 1) return;
                isDragging = true;
                startX = e.clientX - offsetX;
                startY = e.clientY - offsetY;
            });

            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                offsetX = e.clientX - startX;
                offsetY = e.clientY - startY;
                updateZoom();
            });

            window.addEventListener('mouseup', () => {
                isDragging = false;
            });
            
            // Mouse Wheel Zoom
            zoomContainer.addEventListener('wheel', (e) => {
                e.preventDefault();
                const delta = e.deltaY > 0 ? -0.1 : 0.1;
                zoom = Math.min(Math.max(zoom + delta, 0.5), 3);
                updateZoom();
            }, { passive: false });

            // Update Page Indicator
            const updateIndicator = () => {
                indicatorEl.innerText = `${pageFlip.getCurrentPageIndex() + 1} / ${totalLogicalPages}`;
            };

            pageFlip.on('flip', (e) => {
                updateIndicator();
            });

            // Controls
            document.getElementById('prevBtn').addEventListener('click', () => pageFlip.flipPrev());
            document.getElementById('nextBtn').addEventListener('click', () => pageFlip.flipNext());

            updateIndicator();

        } catch (error) {
            console.error('Error rendering PDF brochure:', error);
            loadingEl.innerHTML = `<p style="color: #ff3300;">ERROR ΛL CΛRGΛR EL BROCHURΞ. <br> POR FΛVOR DΞSCΛRGUΞ EL PDF DIRECΛMENTE.</p>`;
        }
    });
</script>
@endsection
