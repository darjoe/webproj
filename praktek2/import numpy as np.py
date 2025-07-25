import numpy as np
import matplotlib.pyplot as plt

class MultilayerPerceptron:
    def __init__(self, input_size, hidden_size, output_size, learning_rate=0.01):
        self.input_size = input_size
        self.hidden_size = hidden_size
        self.output_size = output_size
        self.learning_rate = learning_rate

        # Inisialisasi Bobot dan Bias
        # Bobot dari input ke hidden layer
        self.weights_input_hidden = np.random.randn(self.input_size, self.hidden_size) * 0.01
        self.bias_hidden = np.zeros((1, self.hidden_size))

        # Bobot dari hidden ke output layer
        self.weights_hidden_output = np.random.randn(self.hidden_size, self.output_size) * 0.01
        self.bias_output = np.zeros((1, self.output_size))

    # Fungsi Aktivasi Sigmoid
    def sigmoid(self, x):
        return 1 / (1 + np.exp(-x))

    # Turunan Fungsi Aktivasi Sigmoid
    def sigmoid_derivative(self, x):
        return x * (1 - x)

    # Fungsi Aktivasi ReLU (opsional, bisa diganti sigmoid di hidden layer)
    def relu(self, x):
        return np.maximum(0, x)

    # Turunan Fungsi Aktivasi ReLU
    def relu_derivative(self, x):
        return (x > 0).astype(float)

    def forward(self, X):
        # Layer Input ke Hidden
        self.hidden_input = np.dot(X, self.weights_input_hidden) + self.bias_hidden
        self.hidden_output = self.sigmoid(self.hidden_input) # Menggunakan Sigmoid untuk hidden layer

        # Layer Hidden ke Output
        self.output_input = np.dot(self.hidden_output, self.weights_hidden_output) + self.bias_output
        self.predicted_output = self.sigmoid(self.output_input) # Menggunakan Sigmoid untuk output layer (klasifikasi biner)

        return self.predicted_output

    def backward(self, X, y, predicted_output):
        # Hitung error
        error = y - predicted_output

        # Backpropagation untuk Layer Output
        d_predicted_output = error * self.sigmoid_derivative(predicted_output)

        # Gradien untuk bobot dan bias hidden ke output
        d_weights_hidden_output = np.dot(self.hidden_output.T, d_predicted_output)
        d_bias_output = np.sum(d_predicted_output, axis=0, keepdims=True)

        # Backpropagation untuk Layer Hidden
        error_hidden = np.dot(d_predicted_output, self.weights_hidden_output.T)
        d_hidden_output = error_hidden * self.sigmoid_derivative(self.hidden_output) # Menggunakan turunan Sigmoid untuk hidden layer

        # Gradien untuk bobot dan bias input ke hidden
        d_weights_input_hidden = np.dot(X.T, d_hidden_output)
        d_bias_hidden = np.sum(d_hidden_output, axis=0, keepdims=True)

        # Perbarui Bobot dan Bias
        self.weights_hidden_output += self.learning_rate * d_weights_hidden_output
        self.bias_output += self.learning_rate * d_bias_output
        self.weights_input_hidden += self.learning_rate * d_weights_input_hidden
        self.bias_hidden += self.learning_rate * d_bias_hidden

    def train(self, X, y, epochs):
        losses = []
        for epoch in range(epochs):
            predicted_output = self.forward(X)
            self.backward(X, y, predicted_output)

            # Hitung Loss (Binary Cross-Entropy)
            loss = -np.mean(y * np.log(predicted_output) + (1 - y) * np.log(1 - predicted_output))
            losses.append(loss)

            if epoch % 1000 == 0:
                print(f"Epoch {epoch}, Loss: {loss:.4f}")
        return losses

    def predict(self, X):
        return (self.forward(X) > 0.5).astype(int) # Untuk klasifikasi biner, threshold 0.5

# --- Contoh Penggunaan ---

# 1. Generate Data (Contoh: XOR Gate)
X = np.array([[0, 0],
              [0, 1],
              [1, 0],
              [1, 1]])
y = np.array([[0],
              [1],
              [1],
              [0]])

# 2. Inisialisasi MLP
input_neurons = X.shape[1]
hidden_neurons = 4 # Anda bisa eksperimen dengan jumlah neuron di hidden layer
output_neurons = y.shape[1]
learning_rate = 0.1 # Tingkat pembelajaran

mlp = MultilayerPerceptron(input_neurons, hidden_neurons, output_neurons, learning_rate)

# 3. Latih MLP
epochs = 10000 # Jumlah iterasi pelatihan
losses = mlp.train(X, y, epochs)

# 4. Prediksi dan Evaluasi
predictions = mlp.predict(X)
print("\nPrediksi setelah pelatihan:")
print(predictions)

print("\nTarget sebenarnya:")
print(y)

accuracy = np.mean(predictions == y) * 100
print(f"\nAkurasi: {accuracy:.2f}%")

# 5. Visualisasi Loss
plt.figure(figsize=(10, 6))
plt.plot(losses)
plt.title('Loss Selama Pelatihan')
plt.xlabel('Epoch')
plt.ylabel('Loss')
plt.grid(True)
plt.show()

# --- Contoh dengan dataset yang lebih kompleks (jika Anda ingin) ---
# Anda bisa mencoba dengan data spiral atau moon dari scikit-learn untuk melihat bagaimana performanya
# from sklearn.datasets import make_moons
# X_moon, y_moon = make_moons(n_samples=100, noise=0.1, random_state=42)
# y_moon = y_moon.reshape(-1, 1) # Reshape y agar sesuai dengan output layer

# mlp_moon = MultilayerPerceptron(X_moon.shape[1], 8, 1, learning_rate=0.1)
# losses_moon = mlp_moon.train(X_moon, y_moon, 20000)

# # Visualisasi hasil pada dataset bulan
# # (Anda perlu menambahkan kode visualisasi scatter plot untuk melihat decision boundary)
# plt.figure(figsize=(10, 6))
# plt.scatter(X_moon[:, 0], X_moon[:, 1], c=mlp_moon.predict(X_moon).flatten(), cmap='viridis', marker='o', s=50, alpha=0.8)
# plt.title('Prediksi MLP pada Dataset Bulan')
# plt.xlabel('Fitur 1')
# plt.ylabel('Fitur 2')
# plt.show()