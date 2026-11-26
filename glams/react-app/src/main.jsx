import { Component, StrictMode } from "react";
import { createRoot } from "react-dom/client";
import App from "./App";
import "./index.css";

class SafeErrorBoundary extends Component {
  constructor(props) {
    super(props);
    this.state = { hasError: false };
  }
  static getDerivedStateFromError() {
    return { hasError: true };
  }
  componentDidCatch(error, info) {
    console.error("GLAMS App caught error:", error, info);
    if (typeof document !== "undefined") {
      document.body.classList.remove("glams-react-active");
    }
  }
  render() {
    if (this.state.hasError) {
      return null;
    }
    return this.props.children;
  }
}

const root = document.getElementById("glams-root");
if (root) {
  try {
    createRoot(root).render(
      <StrictMode>
        <SafeErrorBoundary>
          <App />
        </SafeErrorBoundary>
      </StrictMode>
    );
  } catch (err) {
    console.error("GLAMS mounting error:", err);
    if (typeof document !== "undefined") {
      document.body.classList.remove("glams-react-active");
    }
  }
}
