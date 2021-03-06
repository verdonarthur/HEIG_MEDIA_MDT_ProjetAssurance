<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 03.03.2016
 * Time: 16:19
 */

return [
    'bd' => [
        'error' => 'Erreur technique : :error',
    ],
    'not_implemented' => "Cette fonctionnalité n'est pas encore implémentée.",
    'valide' => "C'est validey !",
    'article' => [
        'exists' => "Ce numéro d'article est déjà utilisé pour un article existant.",
        'saved' => "Le nouvel article publicitaire a correctement été sauvegardé.",
        'missing' => "Il n'existe aucun article avec ce numéro.",
        'unavailable' => "Cet article n'est pas disponible.",
        'nb' => [
            'missing' => "Il n'existe aucune article avec le numéro :nb.",
            'unavailable' => "L'article n°:nb n'est pas disponible."
        ]
    ],
    'sinistre' => [
        'exists' => "Un sinistre existe déjà avec cette référence pour cette date là.",
        'saved' => "Le nouveau sinistre a correctement été sauvegardé.",
        'missing' => "Il n'existe aucun sinistre possédant cette référence pour cette date."
    ],
    'ligne' => [
        'exists' => "Une ligne de commande pour cet article existe déjà pour cette commande."
    ],
    'commande' => [
        'missing' => "Il n'existe aucune commande avec ce numéro.",
        'saved' => "La nouvelle commande a correctement été créée."
    ],
    'client' => [
        'missing' => "Il n'existe aucun client avec ce numéro.",
        'saved' => "Le nouveau client a correctement été sauvegardé."
    ],
    'contrat' => [
        'saved' => "Le nouveau contrat a correctement été sauvegardé.",
        'missing' => "Il n'existe aucun contrat avec ce numéro pour ce client."
    ],
    'couverture' => [
        'date_error' => "La date du sinistre choisi est en dehors de la période de couverture du contrat choisi.",
        'saved' => "La nouvelle couverture a correctement été sauvegardée."
    ]
];