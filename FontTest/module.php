<?php

declare(strict_types=1);

class FontTest extends IPSModule
{
    public function Create(): void
    {
        parent::Create();

        /*
         * Native Visualisierung.
         * Keine HTMLBox und keine zyklischen Updates.
         */
        $this->SetVisualizationType(1);
    }

    public function ApplyChanges(): void
    {
        parent::ApplyChanges();
    }

    public function GetVisualizationTile(): string
    {
        $file =
            __DIR__ .
            DIRECTORY_SEPARATOR .
            'module.html';

        if (!file_exists($file)) {
            return
                '<div style="' .
                'padding:20px;' .
                'font-family:Arial,sans-serif;' .
                '">' .
                'module.html nicht gefunden.' .
                '</div>';
        }

        $html =
            file_get_contents(
                $file
            );

        if ($html === false) {
            return
                '<div style="' .
                'padding:20px;' .
                'font-family:Arial,sans-serif;' .
                '">' .
                'module.html konnte nicht gelesen werden.' .
                '</div>';
        }

        return $html;
    }
}
