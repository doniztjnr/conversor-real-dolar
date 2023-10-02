<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/vendor/autoload.php';

use src\Moeda;
use Tkui\DotEnv;
use Tkui\Layouts\Pack;
use Tkui\TclTk\TkAppFactory;
use Tkui\TclTk\TkFont;
use Tkui\Widgets\Buttons\Button;
use Tkui\Widgets\Entry;
use Tkui\Widgets\Frame;
use Tkui\Widgets\Label;
use Tkui\Widgets\LabelFrame;
use Tkui\Windows\MainWindow;

function realToDolar(string $real, Label $dolarLabel): void
{
    if (!is_numeric($real)) {
        return;
    }
    $dolarLabel->text = '$' . (string)round(
        ((float)$real / (float)(new Moeda())->USDBRL()['high']),
        2
    );
}

const APP_NAME = 'PHPUI';
const APP_FONT = new TkFont('Helvetica', 11, TkFont::STYLE_REGULAR);

$factory = new TkAppFactory(APP_NAME);
$app = $factory->createFromEnvironment(DotEnv::create(dirname(__DIR__)));
$mainWindow = new MainWindow($app, 'CÂMBIO');

$labelFrameInfo = new LabelFrame($mainWindow, 'Informação');
$labelDolar = new Label($labelFrameInfo, 'Dolar - $1.00');
$labelDolar->font = APP_FONT;
$labelReal = new Label(
    $labelFrameInfo,
    'Real - R$' . (new Moeda())->USDBRL()['high']
);
$labelReal->font = APP_FONT;
$labelFrameInfo->pack(
    [$labelDolar,
    $labelReal],
    ['padx' => 5, 'pady' => 5, 'anchor' => 'w']
);

$labelFrameConverter = new LabelFrame($mainWindow, 'Conversor de R$ para $');
$realEntry = new Entry($labelFrameConverter);
$realEntry->font = APP_FONT;
$dolarLabel = new Label($labelFrameConverter, '');
$dolarLabel->font = APP_FONT;
$labelFrameConverter->pack(
    [$realEntry,
    $dolarLabel],
    ['padx' => 5, 'pady' => 5, 'ipadx' => 3, 'ipady' => 3]
);

$buttonFrame = new Frame($mainWindow);
$converterButton = new Button($labelFrameConverter, 'CONVERTER');
$converterButton->onClick(fn () => realToDolar($realEntry->getValue(), $dolarLabel));
$buttonFrame->pack(
    $converterButton,
    ['padx' => 5, 'pady' => 5, 'ipadx' => 3, 'ipady' => 3, 'anchor' => 'e']
);

$mainWindow->pack(
    [$labelFrameInfo, $labelFrameConverter,
    $buttonFrame],
    ['padx' => 5, 'pady' => 2, 'fill' => Pack::FILL_X]
);
$app->run();
