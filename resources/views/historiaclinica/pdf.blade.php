<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica - Detalle</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }

        h1 {
            color: #2c5282;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .field-label {
            font-weight: bold;
        }

        .field-value {
            margin-bottom: 10px;
        }

        .field-value textarea {
            width: 100%;
            height: 100px;
            resize: none;
        }

        .btn-primary {
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Historia Clínica # {{ $historiaClinica->id }}</h1>
        <hr class="border-t border-blue-300 mb-4">
        <div class="field">
            <span class="field-label">Antecedentes Médicos:</span>
            <div class="field-value">{{ $historiaClinica->antecedentes_medicos }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Indicaciones Médicas:</span>
            <div class="field-value">{{ $historiaClinica->indicaciones_medicas }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Diagnóstico Médico:</span>
            <div class="field-value">{{ $historiaClinica->diagnostico_medico }}</div>
        </div>

        <div class="field">
            <span class="field-label">Examenes Médicos:</span>
            <div class="field-value">{{ $historiaClinica->examenes_medicos }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Alergias:</span>
            <div class="field-value">{{ $historiaClinica->alergias }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Afiliación:</span>
            <div class="field-value">{{ $historiaClinica->afiliacion }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">CIE:</span>
            <div class="field-value">{{ $historiaClinica->cie }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Nombre del Doctor:</span>
            <div class="field-value">{{ $historiaClinica->doctor->name }}</div>
        </div>
    
        <div class="field">
            <span class="field-label">Nombre del Paciente:</span>
            <div class="field-value">{{ $historiaClinica->paciente->name }}</div>
        </div>
    </div>
</body>
</html>
