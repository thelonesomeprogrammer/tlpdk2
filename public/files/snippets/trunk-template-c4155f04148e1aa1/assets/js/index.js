
export async function WebGPU() {
  if (!navigator.gpu) {
    return false
  }
  const adapter = await navigator.gpu.requestAdapter();
  if (!adapter) {
    return false
  }
  true
}
