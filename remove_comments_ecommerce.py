#!/usr/bin/env python3
# -*- coding: utf-8 -*-
"""
Script de suppression de commentaires pour projet Laravel Ecommerce
Supprime tous les commentaires PHP, Blade, JavaScript, HTML
"""

import os
import re
from pathlib import Path

BASE_DIR = r"d:\ISGA\zipped_projets\ecommerce_shop"

# Répertoires à traiter
DIRECTORIES = [
    "app/Http",
    "app/Models",
    "app/View",
    "config",
    "database",
    "lang",
    "resources/views",
    "routes",
]

# Fichiers spécifiques
SPECIFIC_FILES = [
    "app/Providers/RouteServiceProvider.php",
    "composer.json",
    "package.json",
]

def remove_comments_from_file(file_path):
    """Supprime tous les commentaires d'un fichier"""
    try:
        with open(file_path, 'r', encoding='utf-8') as f:
            content = f.read()
        
        original_content = content
        ext = Path(file_path).suffix.lower()
        
        # PHP et Blade
        if ext in ['.php', '.blade.php']:
            # Supprimer les commentaires PHPDoc /** ... */
            content = re.sub(r'/\*\*[\s\S]*?\*/', '', content)
            # Supprimer les commentaires multilignes /* ... */
            content = re.sub(r'/\*[\s\S]*?\*/', '', content)
            # Supprimer les commentaires //
            content = re.sub(r'//.*$', '', content, flags=re.MULTILINE)
            # Supprimer les commentaires # (PHP peut utiliser #)
            content = re.sub(r'(?<![\'"\\])#(?![^\'"]*[\'"]).*$', '', content, flags=re.MULTILINE)
            # Supprimer les commentaires HTML dans Blade
            content = re.sub(r'<!--[\s\S]*?-->', '', content)
        
        # JavaScript
        elif ext in ['.js', '.jsx']:
            content = re.sub(r'/\*[\s\S]*?\*/', '', content)
            content = re.sub(r'//.*$', '', content, flags=re.MULTILINE)
        
        # JSON (commentaires non standards mais parfois présents)
        elif ext == '.json':
            content = re.sub(r'//.*$', '', content, flags=re.MULTILINE)
            content = re.sub(r'/\*[\s\S]*?\*/', '', content)
        
        # YAML et autres configs
        elif ext in ['.yml', '.yaml']:
            content = re.sub(r'^\s*#.*$', '', content, flags=re.MULTILINE)
        
        # HTML
        elif ext in ['.html', '.htm']:
            content = re.sub(r'<!--[\s\S]*?-->', '', content)
        
        # Nettoyer les lignes vides multiples
        lines = content.split('\n')
        cleaned_lines = []
        prev_empty = False
        for line in lines:
            if line.strip() == '':
                if not prev_empty:
                    cleaned_lines.append(line)
                prev_empty = True
            else:
                cleaned_lines.append(line)
                prev_empty = False
        
        content = '\n'.join(cleaned_lines)
        
        if content != original_content:
            with open(file_path, 'w', encoding='utf-8') as f:
                f.write(content)
            return True, "modified"
        return True, "no_comments"
    
    except Exception as e:
        print(f"✗ Erreur: {file_path} - {e}")
        return False, str(e)

def process_directory(dir_path):
    """Traite tous les fichiers d'un répertoire"""
    processed = []
    full_path = os.path.join(BASE_DIR, dir_path.replace('/', os.sep))
    
    if not os.path.exists(full_path):
        print(f"✗ Répertoire non trouvé: {full_path}")
        return processed
    
    for root, dirs, files in os.walk(full_path):
        for file in files:
            file_path = os.path.join(root, file)
            rel_path = os.path.relpath(file_path, BASE_DIR)
            
            success, status = remove_comments_from_file(file_path)
            if success:
                processed.append(rel_path)
                if status == "modified":
                    print(f"  ✓ {rel_path}")
    
    return processed

def main():
    print("="*80)
    print("  SUPPRESSION DES COMMENTAIRES")
    print("  Projet: ecommerce_shop (Laravel)")
    print("="*80)
    
    if not os.path.exists(BASE_DIR):
        print(f"\n✗ Erreur: Répertoire non trouvé: {BASE_DIR}")
        return
    
    all_processed = []
    
    # Traiter les répertoires
    print("\n=== Traitement des répertoires ===\n")
    for directory in DIRECTORIES:
        print(f"\n[{directory}]")
        processed = process_directory(directory)
        all_processed.extend(processed)
    
    # Traiter les fichiers spécifiques
    print("\n=== Traitement des fichiers spécifiques ===\n")
    for file_rel in SPECIFIC_FILES:
        file_path = os.path.join(BASE_DIR, file_rel.replace('/', os.sep))
        if os.path.exists(file_path):
            success, status = remove_comments_from_file(file_path)
            if success:
                all_processed.append(file_rel.replace('/', os.sep))
                if status == "modified":
                    print(f"  ✓ {file_rel}")
        else:
            print(f"  ✗ Fichier non trouvé: {file_rel}")
    
    # Résumé
    print("\n" + "="*80)
    print("  RÉSUMÉ")
    print("="*80)
    print(f"Total fichiers traités: {len(all_processed)}")
    print("="*80)
    
    # Liste complète des fichiers
    print("\n" + "="*80)
    print("  LISTE DES FICHIERS TRAITÉS")
    print("="*80 + "\n")
    
    # Grouper par répertoire
    files_by_dir = {}
    for file_path in sorted(all_processed):
        dir_name = os.path.dirname(file_path)
        if not dir_name:
            dir_name = "Racine"
        if dir_name not in files_by_dir:
            files_by_dir[dir_name] = []
        files_by_dir[dir_name].append(os.path.basename(file_path))
    
    for dir_name in sorted(files_by_dir.keys()):
        print(f"\n[{dir_name}]")
        for filename in sorted(files_by_dir[dir_name]):
            print(f"  - {filename}")
    
    print("\n" + "="*80 + "\n")

if __name__ == "__main__":
    main()
