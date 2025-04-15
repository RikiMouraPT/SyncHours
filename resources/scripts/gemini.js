import { GoogleGenAI, Type } from '@google/genai';

async function main() {
  // Recupera o input passado pelo Laravel
  const inputText = process.argv[2];  // O inputText é passado como o primeiro argumento

  if (!inputText) {
    console.error('Nenhum input fornecido!');
    return;
  }

  // Cria a instância do GoogleGenAI com a API Key
  const ai = new GoogleGenAI({
    apiKey: process.env.GEMINI_API_KEY,
  });

  const config = {
    temperature: 0.3,
    responseMimeType: 'application/json',
    
    systemInstruction: [
        {
            "text": "Com base nos JSON fornecidos, cria um plano de estudo para cada exame listado em 'userExams'. Distribui o estudo ao longo da semana de forma eficiente, respeitando os horários ocupados em 'userConfig'. O objetivo é que cada exame seja estudado de forma balanceada, com tempo suficiente para revisão antes da data do exame, sem sobrecarregar o aluno. Aqui estão as regras para distribuir o estudo:\n" +
                    "- Distribui o estudo para cada exame em blocos de 1-2 horas por dia, começando pelos exames mais próximos.\n" +
                    "- Apenas aloca o tempo de estudo nos horários livres definidos em 'userConfig'.\n" +
                    "- Evita sobrepor o tempo de estudo com horários ocupados.\n" +
                    "- Distribui o estudo para cada exame nos dias anteriores ao exame, com mais ênfase nos dias mais próximos.\n" +
                    "- A resposta deve ser organizada por dias da semana, e deve incluir o nome do exame, horário de início e término para cada sessão de estudo.\n" +
                    "- Não deves meter dias de estudos após o dia do exame ou antes do dia atual.\n" +
                    "- A resposta deve ser em formato JSON, com os dias da semana como chaves e os horários de estudo como valores.\n" +
                    "\n" +
                    "Formato esperado de resposta:\n" +
                    "\"monday\": [ {\"exam\": \"Fisica I\", \"start\": \"09:00\", \"end\": \"11:00\"} ],\n" +
                    "\"tuesday\": [ {\"exam\": \"Estatistica I\", \"start\": \"14:00\", \"end\": \"16:00\"} ]"
        }
    ]

  };

  const model = 'gemini-2.0-flash';
  const contents = [
    {
      role: 'user',
      parts: [
        {
          text: inputText,  // Aqui passamos o inputText que foi enviado pelo Laravel
        },
      ],
    },
  ];

  try {
    const response = await ai.models.generateContentStream({
      model,
      config,
      contents,
    });

    let result = '';
    for await (const chunk of response) {
      result += chunk.text;
    }

    // Retorna a resposta para o Laravel
    console.log(result);  // Imprime a resposta gerada pelo AI
  } catch (error) {
    console.error('Erro ao gerar conteúdo:', error);
  }
}

main();
