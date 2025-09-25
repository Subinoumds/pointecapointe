@extends('layouts.app')

@section('title', 'Repas de Groupe - Pointe ça Pointe')
@section('description', 'Organisez votre soirée au bistrot La Pointe. Réservez pour une famille, un groupe d\'amis')

@section('content')
<section class="bg-gray-50 py-20 relative">
    <div class="container mx-auto max-w-3xl px-4">
        <h2 class="text-3xl font-bold text-primary-blue mb-8 text-center">Réservation de groupe</h2>
        
        <div class="flex items-center justify-between mb-10">
            <div class="flex-1 h-2 bg-gray-200 rounded-full relative">
                <div id="progress-bar" class="h-2 bg-secondary-yellow rounded-full transition-all duration-500 w-1/6"></div>
            </div>
            <span id="progress-step" class="ml-4 font-semibold text-primary-blue">1 / 6</span>
        </div>

        <form id="reservationForm" class="space-y-6" method="POST" novalidate>
            <input type="hidden" name="access_key" value="691a3f54-c82b-4a0e-a433-91d49a6f6660">
            <input type="hidden" name="subject" value="Nouvelle réservation de groupe">
        
            <div class="form-step">
                <label class="block text-lg font-medium text-primary-blue mb-2">Quelle est la raison ?</label>
                <select id="reasonSelect" name="raison" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-secondary-yellow" required>
                    <option value="" disabled selected>Choisissez...</option>
                    <option value="Repas de travail">Repas de travail</option>
                    <option value="Anniversaire">Anniversaire</option>
                    <option value="Privatisation du bistrot">Privatisation du bistrot</option>
                    <option value="Autre">Autre</option>
                </select>
                <input id="otherReason" name="autre_raison" type="text" placeholder="Précisez la raison" 
                       class="w-full p-3 border rounded-xl mt-4 hidden focus:ring-2 focus:ring-secondary-yellow">
            </div>

            <div class="form-step hidden">
                <label class="block text-lg font-medium text-primary-blue mb-2">Date souhaitée</label>
                <input type="date" name="date_souhaitee" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-secondary-yellow" required>
            </div>

            <div class="form-step hidden">
                <label class="block text-lg font-medium text-primary-blue mb-2">Nombre de personnes</label>
                <input type="number" name="nombre_personnes" min="2" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-secondary-yellow" required>
            </div>

            <div class="form-step hidden">
                <label class="block text-lg font-medium text-primary-blue mb-2">Allergies ou demandes particulières</label>
                <textarea name="allergies_demandes" rows="3" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-secondary-yellow"></textarea>
            </div>

            <div class="form-step hidden">
                <label class="block text-lg font-medium text-primary-blue mb-2">Vos coordonnées</label>
                <input type="text" name="nom_prenom" placeholder="Nom et prénom" class="w-full p-3 border rounded-xl mb-4 focus:ring-2 focus:ring-secondary-yellow" required>
                <input type="email" name="email" placeholder="Email" class="w-full p-3 border rounded-xl mb-4 focus:ring-2 focus:ring-secondary-yellow" required>
                <input type="tel" name="telephone" placeholder="Téléphone" class="w-full p-3 border rounded-xl focus:ring-2 focus:ring-secondary-yellow" required>
            </div>

            <div class="form-step hidden text-center">
                <h3 class="text-2xl font-bold text-primary-blue mb-4">Merci 🎉</h3>
                <p class="text-gray-600">Nous avons bien reçu votre demande. Nous vous recontacterons rapidement.</p>
            </div>

            <div class="flex justify-between mt-8" id="form-buttons">
                <button type="button" id="prevBtn" class="px-6 py-3 bg-gray-300 rounded-xl text-primary-blue font-semibold hidden">Précédent</button>
                <button type="button" id="nextBtn" class="ml-auto px-6 py-3 bg-primary-blue text-white rounded-xl font-semibold">Suivant</button>
            </div>
            
            <div class="flex justify-center mt-8 hidden" id="return-button-container">
                <a href="{{ route('home') }}" class="px-6 py-3 bg-primary-blue text-white rounded-xl font-semibold text-center">Retour à l'accueil</a>
            </div>
        </form>
    </div>
</section>

<section class="bg-white py-20 relative">
    <div class="wave-container">
        <div class="wave bottom-wave-blue"></div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Gestion du formulaire de réservation
    const form = document.getElementById("reservationForm");
    const steps = document.querySelectorAll(".form-step");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const progressBar = document.getElementById("progress-bar");
    const progressStep = document.getElementById("progress-step");
    const reasonSelect = document.getElementById("reasonSelect");
    const otherReason = document.getElementById("otherReason");
    const formButtons = document.getElementById("form-buttons");
    const returnButtonContainer = document.getElementById("return-button-container");

    let currentStep = 0;

    function updateForm() {
        steps.forEach((step, index) => {
            step.classList.toggle("hidden", index !== currentStep);
        });
        prevBtn.classList.toggle("hidden", currentStep === 0);

        if (currentStep === 4) {
            nextBtn.textContent = "Envoyer";
        } else if (currentStep === 5) {
            formButtons.classList.add("hidden");
            returnButtonContainer.classList.remove("hidden");
        } else {
            nextBtn.textContent = "Suivant";
            nextBtn.setAttribute('type', 'button');
        }

        progressBar.style.width = ((currentStep + 1) / steps.length) * 100 + "%";
        progressStep.textContent = `${currentStep + 1} / ${steps.length}`;
    }

    function validateCurrentStep() {
        const currentInputs = steps[currentStep].querySelectorAll('input[required], select[required]');
        let allFieldsValid = true;
        currentInputs.forEach(input => {
            if (!input.checkValidity()) {
                allFieldsValid = false;
            }
        });

        // Validation spécifique pour la raison "Autre"
        if (reasonSelect.value === "Autre" && otherReason.value.trim() === "") {
            allFieldsValid = false;
        }

        return allFieldsValid;
    }

    nextBtn.addEventListener("click", () => {
        if (validateCurrentStep()) {
            if (currentStep < 4) {
                // Passe à l'étape suivante si on n'est pas à la dernière étape
                currentStep++;
                updateForm();
            } else {
                // Si c'est la dernière étape (index 4), on soumet le formulaire via fetch
                const formData = new FormData(form);
                const object = Object.fromEntries(formData);
                const json = JSON.stringify(object);

                fetch("https://api.web3forms.com/submit", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json"
                    },
                    body: json
                })
                .then(async (response) => {
                    let jsonResponse = await response.json();
                    if (response.status === 200) {
                        // Si la soumission est réussie, passe à l'étape de remerciement
                        currentStep = 5;
                        updateForm();
                    } else {
                        console.error("Erreur de soumission:", jsonResponse);
                        alert("Une erreur est survenue, veuillez réessayer.");
                    }
                })
                .catch(error => {
                    console.error("Erreur réseau:", error);
                    alert("Une erreur est survenue, veuillez réessayer.");
                });
            }
        } else {
            alert("Veuillez remplir tous les champs obligatoires avant de continuer.");
        }
    });

    // Gérer la soumission du formulaire uniquement sur le bouton 'Envoyer'
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        const formData = new FormData(form);
        const object = Object.fromEntries(formData);
        const json = JSON.stringify(object);

        fetch("https://api.web3forms.com/submit", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "Accept": "application/json"
            },
            body: json
        })
        .then(async (response) => {
            let jsonResponse = await response.json();
            if (response.status == 200) {
                currentStep = 5;
                updateForm();
            } else {
                console.log(response);
                alert("Une erreur est survenue, veuillez réessayer.");
            }
        })
        .catch(error => {
            console.log(error);
            alert("Une erreur est survenue, veuillez réessayer.");
        });
    });

    prevBtn.addEventListener("click", () => {
        if (currentStep > 0) {
            currentStep--;
            updateForm();
        }
    });

    // Gestion de l'affichage du champ "autre raison"
    reasonSelect.addEventListener("change", () => {
        if (reasonSelect.value === "Autre") {
            otherReason.classList.remove("hidden");
        } else {
            otherReason.classList.add("hidden");
        }
    });

    updateForm();
});
</script>
@endsection