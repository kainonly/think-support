package library

import "github.com/kataras/iris/mvc"

type BaseController struct {
	Model string
}

func (controller *BaseController) BeforeActivation(b mvc.BeforeActivation) {
	b.Handle("POST", "/"+controller.Model+"/get", "GetOperateHandle")
}
