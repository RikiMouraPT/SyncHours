import { GoogleGenAI } from "@google/genai";

const ai = new GoogleGenAI({ apiKey: "YOUR_API_KEY" });

async function generateStudyPlan(inputText) {
  try {
    // Faz a chamada para a API do Gemini
    const response = await ai.models.generateContent({
      model: "gemini-2.0-flash",  // Pode ser outro modelo, se necessário
      contents: inputText,  // O texto de entrada com os exames e configurações
    });

    // A resposta vem em 'response.text'
    console.log("Resposta da AI: ", response.text);

    // Retorna o texto da resposta
    return response.text;
  } catch (error) {
    console.error("Erro ao chamar a API do Gemini:", error);
    return null;
  }
}

// Testa a função com um exemplo de entrada
const inputText = `Plano de estudo com base nos exames e configurações fornecidos.`;
generateStudyPlan(inputText).then(output => {
  console.log("Plano de estudo gerado:", output);
});
