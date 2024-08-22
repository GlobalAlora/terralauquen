#!/bin/bash
theme_directory=$(dirname "$0")
function_php_path="$theme_directory/functions.php"
version_txt_path="$theme_directory/version.txt"

current_version=$(cat "$version_txt_path")

# Incrementar la versión
IFS='.' read -r -a version_parts <<< "$current_version"
major_version="${version_parts[0]}"
minor_version="${version_parts[1]}"
patch_version="${version_parts[2]}"


if $major_version = ''; then
    $major_version = '1'
fi

if $minor_version = ''; then
    $minor_version = '0'
fi

((patch_version++))

new_version="$major_version.$minor_version.$patch_version"

# Actualizar la versión en version.txt
echo "$new_version" > "$version_txt_path"

# Actualizar la versión en functions.php
sed -i '' "s/define('_S_VERSION', '.*')/define('_S_VERSION', '$new_version')/" "$function_php_path"

echo "Nueva version: $new_version en functions.php"

if grep -q "_S_VERSION', '$new_version'" "$function_php_path"; then
    echo "La versión se ha actualizado correctamente en functions.php"
else
    echo "Error: La versión no se ha actualizado en functions.php"
fi